<?php

namespace App\Http\Controllers\BannerPrograms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerProgram extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request)
	{
		return view('banner-programs.index');
	}
}
