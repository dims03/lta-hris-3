<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\BackendServices;
use Illuminate\Http\Request;

class BackendController extends Controller
{
  public function __construct(BackendServices $service)
	{
		$this->service = $service;
	}

	public function index()
  {
    $data = [
      'title' => 'Dashboard'
    ];

    return view('backend.index')->with($data);
  }

  public function logout()
  {
    auth()->guard('web')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
    return redirect(route('login'));
  }
}
