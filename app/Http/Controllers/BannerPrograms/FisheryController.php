<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Models\BannerPrograms\Fishery;
use App\Http\Requests\StoreFisheryRequest;
use App\Http\Requests\UpdateFisheryRequest;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class FisheryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.fishery.index');
	}

	public function showTable()
	{
		if(request()->ajax()) {
			$fishermen = Fishery::join('farmers as farmer', 'farmer.id', '=', 'fisheries.fisherman_name')
			->select('fisheries.id', 'farmer.name as fisherman_name', 'fisheries.fisherman_barangay', 'fisheries.fishing_activities', 'fisheries.aquaculture_details', 'fisheries.insurance_or_renewal');

			return DataTables::of($fishermen)
			->filterColumn('fisherman_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->addColumn('action','banner-programs.fishery.table-buttons')
			->rawColumns(['action'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$fishermen = Farmer::where('banner_program', 'Fisheries Program')->get();
		return view('banner-programs.fishery.create',compact('fishermen'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreFisheryRequest $request)
	{
		$data = $request->validated();

		$fisheries = new Fishery();
		$fisheries->fisherman_name = $data['fisherman_name'];
		$fisheries->fisherman_barangay = $data['fisherman_barangay'];
		$fisheries->fishing_activities = $data['fishing_activities'];
		$fisheries->aquaculture_details = $data['aquaculture_details'];
		$fisheries->form_of_fishing = $data['form_of_fishing'];
		$fisheries->insurance_or_renewal = $data['insurance_or_renewal'];
		$fisheries->save();

		toast('Fisherman for Fisheries Program created successfully!','success');
		return redirect()->route('fisheries.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Fishery $fishery)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Fishery $fishery)
	{
		$selectedFisherman = Farmer::where('id', $fishery->fisherman_name)->first();
		$selectedFishermanName = (string)$selectedFisherman->name;

		$insuranceStatus = $fishery->insurance_or_renewal;
		return view('banner-programs.fishery.edit',compact('fishery','insuranceStatus','selectedFishermanName'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateFisheryRequest $request, Fishery $fishery)
	{
		$data = $request->validated();

		$fishery->fisherman_barangay = $data['fisherman_barangay'];
		$fishery->fishing_activities = $data['fishing_activities'];
		$fishery->aquaculture_details = $data['aquaculture_details'];
		$fishery->form_of_fishing = $data['form_of_fishing'];
		$fishery->insurance_or_renewal = $data['insurance_or_renewal'];
		$fishery->save();

		toast('Fisherman for Fisheries Program updated successfully!','success');
		return redirect()->route('fisheries.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Fishery $fishery)
	{
		if(request()->ajax()) {
			$fishery->delete();
			return response()->json([
				'success' => true,
				'message' => 'Fisherman for Fisheries Program deleted successfully!'
			],Response::HTTP_OK);
		}
	}
}
