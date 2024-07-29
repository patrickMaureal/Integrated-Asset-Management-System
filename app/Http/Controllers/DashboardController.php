<?php

namespace App\Http\Controllers;

use App\Models\BannerPrograms\Corn;
use App\Models\BannerPrograms\Fishery;
use App\Models\BannerPrograms\HighValueCrop;
use App\Models\BannerPrograms\Livestock;
use App\Models\BannerPrograms\OrgAgriculture;
use App\Models\BannerPrograms\Rice;
use App\Models\Farmer\Farmer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(Request $request)
	{
		$years = Farmer::selectRaw('YEAR(created_at) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

		$totalFarmers = Farmer::count();

		//count total of insurance_or_renewal in different models
		$totalCornInsurance = Corn::select('id', 'insurance_or_renewal')->count();
		$totalRiceInsurance = Rice::select('id', 'insurance_or_renewal')->count();
		$totalHighCropInsurance = HighValueCrop::select('id', 'insurance_or_renewal')->count();
		$totalOrganicAgricultureInsurance = OrgAgriculture::select('id', 'insurance_or_renewal')->count();
		$totalFisheriesInsurance = Fishery::select('id', 'insurance_or_renewal')->count();
		$totalLivestockInsurance = Livestock::select('id', 'insurance_or_renewal')->count();

		$totalInsurance = $totalCornInsurance + $totalRiceInsurance + $totalHighCropInsurance + $totalOrganicAgricultureInsurance + $totalFisheriesInsurance + $totalLivestockInsurance;


		return view('dashboard', compact('totalFarmers', 'totalInsurance', 'years'));
	}

	public function showChart(Request $request)
	{
		$selectedYear = $request->input('selectedYear');

		// Fetch all farmers created in the selected year
    $farmers = Farmer::whereYear('created_at', $selectedYear)->get();

    // Group the farmers by barangay
    $groupByBarangay = $farmers->groupBy(function ($farmer) {
			return $farmer->barangay;
    });

		//sort by alphabetical order of barangay
		$sortByBarangay = $groupByBarangay->sortKeys();

		// Get the labels for the chart
		$labels = $sortByBarangay->keys()->all();

		// Get the data for the chart
		$totalFarmers = $groupByBarangay->map(function ($farmers) {
			return $farmers->count();
		});

		return response()->json([
			'selectedYear' => $selectedYear,
			'labels' => $labels,
			'datasets' => [
				[
					'label' => 'Number of Farmers in Each Barangay in ' . $selectedYear,
					'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
					'borderColor' => 'rgb(75, 192, 192)',
					'data' => $totalFarmers,
					'borderWidth'=> 1,
				],
			],
		]);

	}
}
