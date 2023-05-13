@extends('layouts.backend.app')
@section('header')
<div class="page-header page-header-light">
	<div class="page-header-content d-sm-flex">
		<div class="page-title">
			<h4><span class="font-weight-semibold">{{ $title }}</h4>
		</div>

		<div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
			{{-- <a href="#" class="btn btn-success btn-sm">Export</a>
			<a href="{{ route('backend.employee.create') }}" class="btn btn-primary btn-sm">Tambah Data</a> --}}
		</div>
	</div>

	<div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="#" class="breadcrumb-item">
					<i class="icon-home2 mr-2"></i> Human Resources Information System
				</a>
				<span class="breadcrumb-item active">Data Karyawan</span>
				<span class="breadcrumb-item active">{{ $title }}</span>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="content">
	<div class="row">
		<div class="col-xl-12">
			@include('backend.template.alert')
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header bg-white header-elements-inline">
					<h6 class="card-title">NIK {{ $row['nik'] }} {!! $row['resign_st']==1 ? '<span class="badge badge-danger">RESIGN</span>' : '' !!}</h6>
					<div class="header-elements">
						@if ($row['resign_st']!=1)
						<button type="button" class="btn btn-sm bg-grey-300 btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<i class="icon-cogs"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:void(0);" data-id="{{ $row['id'] }}" class="dropdown-item edit">Edit Data</a>
							<a href="#" onclick="return confirm('Anda yakin ingin reset password karyawan ?')" class="dropdown-item">Reset Password</a>
							<a href="javascript:void(0);" data-id="{{ $row['id'] }}" class="dropdown-item sign">Upload Tanda Tangan</a>
							<a href="javascript:void(0);" data-id="{{ $row['id'] }}" class="dropdown-item resign">Karyawan Resign</a>
						</div>
						@endif
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped table-borderless">
						<col style="width:20%">
						<col style="width:23%">
						<tr>
							<td colspan="2" class="text-center">
								{!! $row->image_pic !!}
							</td>
							<tr>
								<td>Nama</td>
								<td>{{ $row->name }}</td>
							</tr>
							<tr>
								<td>Tempat & Tanggal Lahir</td>
								<td>{{ $row->tempat_lahir }}, {{ tgl_indo($row->tgl_lahir) }}</td>
							</tr>
							<tr>
								<td>Handphone</td>
								<td>{{ $row->no_hp }}</td>
							</tr>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection