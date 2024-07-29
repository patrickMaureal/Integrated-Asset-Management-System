<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHighValueCropRequest;
use App\Http\Requests\UpdateHighValueCropRequest;
use Yajra\DataTables\DataTables;

use App\Models\BannerPrograms\HighValueCrop;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Response;

class HighValueCropController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.high-value-crops.index');
	}

	public function showTable()
	{
		if (request()->ajax()) {
			$highValueCrops = HighValueCrop::join('farmers as farmer', 'farmer.id', '=', 'high_value_crops.farmer_name')
			->select('high_value_crops.id', 'farmer.name as farmer_name', 'high_value_crops.farmer_barangay', 'high_value_crops.crop_information', 'high_value_crops.insurance_or_renewal');

			return DataTables::of($highValueCrops)
			->filterColumn('farmer_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->addColumn('action', 'banner-programs.high-value-crops.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$farmers = Farmer::where('banner_program', 'High Value Crops Program')->get();
		return view('banner-programs.high-value-crops.create', compact('farmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreHighValueCropRequest $request)
	{
		$data = $request->validated();

		$highValueCrops = new HighValueCrop();
		$highValueCrops->farmer_name = $data['farmer_name'];
		$highValueCrops->farmer_barangay = $data['farmer_barangay'];
		$highValueCrops->crop_information = $data['crop_information'];
		$highValueCrops->crop_type = $data['crop_type'];
		$highValueCrops->insurance_or_renewal = $data['insurance_or_renewal'];
		$highValueCrops->save();

		toast('Farmer for High Value Crops has been created', 'success');
		return redirect()->route('high-value-crops.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(HighValueCrop $highValueCrop)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(HighValueCrop $highValueCrop)
	{
		$selectedFarmer = Farmer::where('id', $highValueCrop->farmer_name)->first();
		$selectedFarmerName = (string)$selectedFarmer->name;

		$insuranceStatus = $highValueCrop->insurance_or_renewal;

		return view('banner-programs.high-value-crops.edit', compact('highValueCrop', 'selectedFarmerName', 'insuranceStatus'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateHighValueCropRequest $request, HighValueCrop $highValueCrop)
	{
		$data = $request->validated();

		$highValueCrop->farmer_barangay = $data['farmer_barangay'];
		$highValueCrop->crop_information = $data['crop_information'];
		$highValueCrop->crop_type = $data['crop_type'];
		$highValueCrop->insurance_or_renewal = $data['insurance_or_renewal'];

		$highValueCrop->save();

		toast('Farmer for High Value Crops has been updated', 'success');
		return redirect()->route('high-value-crops.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(HighValueCrop $highValueCrop)
	{
		if(request()->ajax()) {
			$highValueCrop->delete();

			return response()->json([
				'success' => true,
				'message' => 'Farmer for High Value Crops has been deleted',
			],Response::HTTP_OK);
		}
	}
}
