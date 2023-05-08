<?php

use App\Models\User;

function getBawahan()
{
	$users_id = auth()->user()->id;

	return User::where('atasan_id',$users_id)->get();
}