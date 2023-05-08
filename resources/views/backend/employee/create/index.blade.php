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
<!-- Content area -->
<div class="content">
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route'=>'backend.employee.store','method'=>'POST','files' => true]) !!}
			<div class="row">
				<div class="col-md-6">
					@include('backend.employee.create.form-left')
				</div>
				<div class="col-md-6">
					@include('backend.employee.create.form-right')
					<div class="form-group row">
						<div class="col-md-4">
							<button class="btn btn-success" type="submit">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- /content area -->
@endsection
@section('customjs')
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();

    $('.datepick').datepicker({
    	autoClose:true
    });
  });
</script>
@endsection