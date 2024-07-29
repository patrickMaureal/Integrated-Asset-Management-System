<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrgAgricultureRequest;
use App\Http\Requests\UpdateOrgAgricultureRequest;
use App\Models\BannerPrograms\OrgAgriculture;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class OrgAgricultureController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('banner-programs.org-agriculture.index');
	}


	public function showTable()
	{
		if(request()->ajax()) {
			$orgAgricultures = OrgAgriculture::join('farmers as farmer', 'farmer.id', '=', 'org_agricultures.farmer_name')
			->select('org_agricultures.id', 'farmer.name as farmer_name', 'org_agricultures.farmer_barangay', 'org_agricultures.organic_type','org_agricultures.created_at');

			return DataTables::of($orgAgricultures)
			->filterColumn('farmer_name', function ($query, $keyword) {
				$query->where('farmer.name', 'like', "%{$keyword}%");
			})
			->editColumn('created_at', function ($row) {
				return $row->created_at->format('F jS \of Y h:i:s A'); // human readable format
			})
			->addColumn('action','banner-programs.org-agriculture.table-buttons')
			->rawColumns(['action','created_at'])
			->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$farmers = Farmer::where('banner_program', 'Organic Agriculture Program')->get();
		return view('banner-programs.org-agriculture.create',compact('farmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
	}

	/**
	 * Display the specified resource.
	 */
	public function show(OrgAgriculture $orgAgriculture)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(OrgAgriculture $organic_agriculture)
	{

	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, OrgAgriculture $organic_agriculture)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(OrgAgriculture $organic_agriculture, Request $request)
	{
		if ($request->ajax()) {
			$organic_agriculture->delete();

			return response()->json([
				'success' => true,
				'message' => 'Organic Agriculture deleted successfully',
			],Response::HTTP_OK);
		}
	}
}
