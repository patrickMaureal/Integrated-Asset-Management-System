<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Models\BannerPrograms\Corn;
use App\Http\Requests\StoreCornRequest;
use App\Http\Requests\UpdateCornRequest;
use App\Models\BannerPrograms\OrgAgriculture;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CornController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.corn.index');
	}

	public function showTable()
	{
		if (request()->ajax()) {
			$corns = Corn::join('farmers as farmer', 'farmer.id', '=', 'corns.farmer_name')
			->select('corns.id', 'farmer.name as farmer_name', 'corns.farmer_barangay', 'corns.farm_details', 'corns.insurance_or_renewal', 'corns.created_at');

			return DataTables::of($corns)
			->filterColumn('farmer_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->editColumn('created_at', function ($row) {
				return $row->created_at->format('F jS \of Y h:i:s A'); // human readable format
			})
			->addColumn('action', 'banner-programs.corn.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$farmers = Farmer::where('banner_program', 'Corn Program')->get();
		return view('banner-programs.corn.create',compact('farmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCornRequest $request)
	{
		$data = $request->validated();

		$corns = new Corn();
		$corns->farmer_name = $data['farmer_name'];
		$corns->farmer_barangay = $data['farmer_barangay'];
		$corns->corn_type = $data['corn_type'];
		$corns->farm_details = $data['farm_details'];
		$corns->hectares_field = $data['hectares_field'];
		$corns->organic_type = $data['organic_type'];
		$corns->insurance_or_renewal = $data['insurance_or_renewal'];
		$corns->save();

		// if organic type is organic
		if ($data['organic_type'] == "Organic") {
			OrgAgriculture::create([
				'farmer_name' => $data['farmer_name'],
				'farmer_barangay' => $data['farmer_barangay'],
				'organic_type' => "Organic:Corn",
			]);
		}


		toast('Farmer for Corn Program created successfully', 'success');

		return redirect()->route('corns.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Corn $corn)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Corn $corn)
	{
		$selectedFarmer = Farmer::where('id', $corn->farmer_name)->first();
		$selectedFarmerName = (string)$selectedFarmer->name;

		$insuranceStatus = $corn->insurance_or_renewal;
		return view('banner-programs.corn.edit',compact('corn','selectedFarmerName','insuranceStatus'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCornRequest $request, Corn $corn)
	{
		$data = $request->validated();

		$corn->farmer_barangay = $data['farmer_barangay'];
		$corn->farm_details = $data['farm_details'];
		$corn->hectares_field = $data['hectares_field'];
		$corn->organic_type = $data['organic_type'];
		$corn->insurance_or_renewal = $data['insurance_or_renewal'];
		$corn->save();

		toast('Farmer for Corn Program updated successfully', 'success');

		return redirect()->route('corns.index');

	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Corn $corn,Request $request)
	{
		if($request->ajax()){
			$corn->delete();
			return response()->json([
				'success' => true,
				'message' => 'Corn deleted successfully',
			],Response::HTTP_OK);
		}
	}
}
