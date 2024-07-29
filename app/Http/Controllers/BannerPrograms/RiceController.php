<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Models\BannerPrograms\Rice;
use App\Http\Requests\StoreRiceRequest;
use App\Http\Requests\UpdateRiceRequest;
use App\Models\BannerPrograms\OrgAgriculture;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class RiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.rice.index');
	}

	public function showTable()
	{
		if (request()->ajax()) {
			$rices = Rice::join('farmers as farmer', 'farmer.id', '=', 'rice.farmer_name')
			->select('rice.id', 'farmer.name as farmer_name', 'rice.farmer_barangay', 'rice.farm_details', 'rice.insurance_or_renewal', 'rice.created_at');

			return DataTables::of($rices)
			->filterColumn('farmer_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->editColumn('created_at', function ($row) {
				return $row->created_at->format('F d, Y h:i A');
			})
			->addColumn('action', 'banner-programs.rice.table-buttons')
			->rawColumns(['action', 'created_at'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$farmers = Farmer::where('banner_program', 'Rice Program')->get();
		return view('banner-programs.rice.create',compact('farmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreRiceRequest $request)
	{
		$data = $request->validated();

		$rices = new Rice();
		$rices->farmer_name = $data['farmer_name'];
		$rices->farmer_barangay = $data['farmer_barangay'];
		$rices->farm_details = $data['farm_details'];
		$rices->rice_type = $data['rice_type'];
		$rices->hectares_field = $data['hectares_field'];
		$rices->organic_type = $data['organic_type'];
		$rices->insurance_or_renewal = $data['insurance_or_renewal'];
		$rices->save();

		if ($data['organic_type'] == "Organic") {
			OrgAgriculture::create([
				'farmer_name' => $data['farmer_name'],
				'farmer_barangay' => $data['farmer_barangay'],
				'organic_type' => "Organic:Rice",
			]);
		}

		toast('Farmer for Rice Program has been created successfully!','success');

		return redirect()->route('rices.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Rice $rice)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Rice $rice)
	{
		$selectedFarmer = Farmer::where('id', $rice->farmer_name)->first();
		$selectedFarmerName = (string)$selectedFarmer->name;

		$insuranceStatus = $rice->insurance_or_renewal;

    return view('banner-programs.rice.edit', compact('rice', 'selectedFarmerName', 'insuranceStatus'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateRiceRequest $request, Rice $rice)
	{
		$data = $request->validated();

		$rice->farmer_barangay = $data['farmer_barangay'];
		$rice->farm_details = $data['farm_details'];
		$rice->rice_type = $data['rice_type'];
		$rice->hectares_field = $data['hectares_field'];
		$rice->organic_type = $data['organic_type'];
		$rice->insurance_or_renewal = $data['insurance_or_renewal'];
		$rice->save();

		toast('Farmer for Rice Program has been updated successfully!','success');
		return redirect()->route('rices.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Rice $rice,Request $request)
	{
		if($request->ajax()){
			$rice->delete();
			return response()->json([
				'success' => true,
				'message' => 'Farmer for Rice Program has been deleted successfully!',
			],Response::HTTP_OK);
		}
	}
}
