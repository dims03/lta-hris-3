<?php

namespace App\Services\Employee;

use App\Models\User;

class EmployeeServices
{
	public function getData()
	{
		$users_id = auth()->user()->id;
    $role = auth()->user()->role_id;

		if ($role==1) 
		{
			$row = User::where('role_id',5)
								 ->whereNull('resign_st')
								 ->get();
		}
		else
		{
			
		}

		return $row;
	}

	public function detail($id)
	{
		$get = User::find($id);

		return $get;
	}
}