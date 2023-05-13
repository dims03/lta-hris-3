@extends('layouts.backend.app')
@section('header')
<div class="page-header page-header-light">
	<div class="page-header-content d-sm-flex">
		<div class="page-title">
			<h4><span class="font-weight-semibold">{{ $title }}</h4>
		</div>

		<div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
			<a href="#" class="btn btn-success btn-sm">Export</a>
			<a href="{{ route('backend.employee.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
		</div>
	</div>

	<div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
		<div class="d-flex">
			<div class="breadcrumb">
				<a href="#" class="breadcrumb-item">
					<i class="icon-home2 mr-2"></i> Human Resources Information System
				</a>
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
		<table class="table table-xs table-striped table-bordered datatable-basic">
			<thead>
				<tr>
					<th class="text-center" width="2px">No</th>
					<th class="text-center">NIK</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Lokasi</th>
					<th class="text-center">Divisi</th>
					<th class="text-center">Department</th>
					<th class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@php
						$no=1;
				@endphp
				@foreach ($row as $item)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $item->nik }}</td>
					<td>{{ $item->name }}</td>
					<td class="text-center">{{ isset($item->lokasi_id) ? $item->lokasi_detail->title : '-' }}</td>
					<td class="text-center">{{ isset($item->divisi_id) ? $item->divisi->title : '-' }}</td>
					<td class="text-center">{{ isset($item->department_id) ? $item->department->title : '-' }}</td>
					<td class="text-center">
						<a href="{{ route('backend.employee.detail',$item->id) }}" target="_blank">
							<span class="badge badge-success">Detail</span>
						</a>
					</td>
				</tr>		
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- /content area -->
@endsection
@section('customjs')
<script type="text/javascript">
  $(document).ready(function(){
    $.extend( $.fn.dataTable.defaults, {
			iDisplayLength:25,        
      autoWidth: false,
			columnDefs: [{ 
				orderable: false,
				targets: [ 0 ]
			}],
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
      language: {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
      }
    });

    var oTable = $('.datatable-basic').DataTable({
    	"select": "single",
    	"serverSide": false,
    	drawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');

      },
      preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
      } 
    });
  });
</script>
@endsection