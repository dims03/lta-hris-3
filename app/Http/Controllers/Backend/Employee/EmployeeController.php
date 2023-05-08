<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Blood;
use App\Models\Country;
use App\Models\Department;
use App\Models\Distrik;
use App\Models\Divisi;
use App\Models\Gender;
use App\Models\Jabatan;
use App\Models\Lokasi;
use App\Models\Marriage;
use App\Models\Perusahaan;
use App\Models\Ptkp;
use App\Models\Religion;
use App\Models\User;
use App\Models\UserLokasi;
use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function __construct(EmployeeServices $service)
	{
		$this->service = $service;
	}

	public function index()
	{
		$assets = [
      'style' => array(
        'assets/js/plugins/air-datepicker/css/datepicker.min.css',
        'assets/css/loading.css'
      ),
      'script' => array(
        'assets/js/plugins/notifications/sweet_alert.min.js',
        'assets/js/plugins/forms/selects/select2.min.js',
        'assets/js/plugins/tables/datatables/datatables.min.js',
        'assets/js/plugins/air-datepicker/js/datepicker.min.js',
				'assets/js/plugins/air-datepicker/js/i18n/datepicker.en.js',
      )
    ];

		$row = $this->service->getData();

		$data = [
      'title' => 'Data Karyawan',
      'assets' => $assets,
			'row' => $row
    ];

		return view('backend.employee.index')->with($data);
	}

	public function create()
	{
		$role = auth()->user()->role_id;
    $users_id = auth()->user()->id;

		$assets = [
      'style' => array(
        'assets/js/plugins/air-datepicker/css/datepicker.min.css'
      ),
      'script' => array(
        'assets/js/plugins/notifications/sweet_alert.min.js',
        'assets/js/plugins/forms/selects/select2.min.js',
				'assets/js/plugins/air-datepicker/js/datepicker.min.js',
				'assets/js/plugins/air-datepicker/js/i18n/datepicker.en.js'
      )
    ];

		$gender = Gender::pluck('title', 'id');
    $religion = Religion::pluck('title', 'id');
    $country = Country::pluck('title', 'id');
    $blood = Blood::pluck('title', 'id');
    $marriage = Marriage::pluck('title', 'id');
    $ptkp = Ptkp::pluck('title', 'id');
    $atasan = User::whereIn('role_id', [2,5])
                  ->whereNull('resign_st')
                  ->orderBy('role_id','ASC')
                  ->pluck('name', 'id');
    $department = Department::pluck('title', 'id');
    $divisi = Divisi::pluck('title', 'id');
    $jabatan = Jabatan::pluck('title', 'id');
    $bank = Bank::pluck('title','id');
    $distrik = Distrik::pluck('title','id');
    $perusahaan = Perusahaan::pluck('title','id');

    if ($role == 1) {
      $lokasi = Lokasi::pluck('title', 'id');
    } else {
      $lokasi = UserLokasi::where('users_id', $users_id)->get();
    }

		$data = [
      'title' => 'Tambah Data Karyawan',
      'assets' => $assets,
      'gender' => $gender,
      'religion' => $religion,
      'country' => $country,
      'blood' => $blood,
      'marriage' => $marriage,
      'lokasi' => $lokasi,
      'ptkp' => $ptkp,
      'role' => $role,
      'department' => $department,
      'divisi' => $divisi,
      'jabatan' => $jabatan,
      'atasan' => $atasan,
      'bank' => $bank,
      'distrik' => $distrik,
      'perusahaan' => $perusahaan
    ];

		return view('backend.employee.create.index')->with($data);
	}

	public function store(Request $request)
	{
		# code...
	}
}
