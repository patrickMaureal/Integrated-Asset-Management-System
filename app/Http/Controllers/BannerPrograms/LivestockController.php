<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Models\BannerPrograms\Livestock;
use App\Http\Requests\StoreLivestockRequest;
use App\Http\Requests\UpdateLivestockRequest;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class LivestockController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.livestock.index');
	}

	public function showTable()
	{
		if(request()->ajax()) {
			$livestocks = Livestock::join('farmers as farmer', 'farmer.id', '=', 'livestocks.farmer_name')
			->select('livestocks.id', 'farmer.name as farmer_name', 'livestocks.farmer_barangay','livestocks.livestock_species', 'livestocks.livestock_number', 'livestocks.age', 'livestocks.color', 'livestocks.insurance_or_renewal');

			return DataTables::of($livestocks)
			->filterColumn('farmer_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->addColumn('action', 'banner-programs.livestock.table-buttons')
			->rawColumns(['action'])
			->toJson();

		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$farmers = Farmer::where('banner_program', 'Livestock Program')->get();
		return view('banner-programs.livestock.create',compact('farmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreLivestockRequest $request)
	{
		$data = $request->validated();

		$livestocks = new Livestock();
		$livestocks->farmer_name = $data['farmer_name'];
		$livestocks->farmer_barangay = $data['farmer_barangay'];
		$livestocks->livestock_species = $data['livestock_species'];
		$livestocks->livestock_number = $data['livestock_number'];
		$livestocks->age = $data['age'];
		$livestocks->color = $data['color'];
		$livestocks->insurance_or_renewal = $data['insurance_or_renewal'];
		$livestocks->save();

		toast('Livestock for Livestock Program created successfully!','success');
		return redirect()->route('livestocks.index');

	}

	/**
	 * Display the specified resource.
	 */
	public function show(Livestock $livestock)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Livestock $livestock)
	{
		$selectedFarmer = Farmer::where('id', $livestock->farmer_name)->first();
		$selectedFarmerName = (string)$selectedFarmer->name;

		$insuranceStatus = $livestock->insurance_or_renewal;

		return view('banner-programs.livestock.edit',compact('livestock','selectedFarmerName','insuranceStatus'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateLivestockRequest $request, Livestock $livestock)
	{
		$data = $request->validated();

		$livestock->farmer_barangay = $data['farmer_barangay'];
		$livestock->livestock_species = $data['livestock_species'];
		$livestock->livestock_number = $data['livestock_number'];
		$livestock->age = $data['age'];
		$livestock->color = $data['color'];
		$livestock->insurance_or_renewal = $data['insurance_or_renewal'];
		$livestock->save();

		toast('Livestock for Livestock Program updated successfully!','success');
		return redirect()->route('livestocks.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Livestock $livestock)
	{
		if(request()->ajax()) {
			$livestock->delete();

			return response()->json([
				'success' => true,
				'message' => 'Livestock for Livestock Program deleted successfully!'
			],Response::HTTP_OK);
		}
	}
}
