<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepartmentJabatan;
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

  public function get_department_jabatan(Request $request)
  {
    $department = $request->department;
    $jabatan = $request->jabatan;

    $get = DepartmentJabatan::where('department_id',$department)
														->where('jabatan_id',$jabatan)
														->get();

		$list = "<option value=''>-- Jabatan --</option>";
		foreach ($get as $key) {
			$list .= "<option value='" . $key->id . "'>" . $key->title . "</option>";
		}
		$callback = array('listdoc' => $list);
		echo json_encode($callback);
  }
}
