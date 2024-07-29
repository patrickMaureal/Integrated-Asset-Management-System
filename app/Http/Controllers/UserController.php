<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
  public function index()
	{
		return view('user.index');
	}

	public function showTable()
	{
		if(request()->ajax()){
			$users = User::where('id', '!=', Auth::id())->select('id', 'name', 'email', 'created_at');

			return DataTables::of($users)
			->editColumn('created_at', function($row){
				return $row->created_at->format('F jS \of Y');
			})
			->addColumn('action', 'user.table-buttons')
			->rawColumns(['action', 'created_at'])
			->ToJson();
		}
	}
}
