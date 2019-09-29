<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class indexController extends Controller
{
	public function index()
	{
		$user = Auth::User();
		return view('index',['user' => $user]);
	}

}