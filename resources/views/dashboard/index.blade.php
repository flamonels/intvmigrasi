@extends('layouts.master')
@section('content')
<div class="container mt-5">
	<h2 class="mb-4">Daftar Konsumen</h2>
	<div class="table-responsive-sm">
		<table id="table-example" class="table table-bordered table-hover table-striped w-100">
			<tfoot id="tfoot" style="display: table-header-group;">
				<tr>
					<th class="hide-search">#</th>
					<th>Project</th>
					<th>Kawasan</th>
					<th>Unit</th>
					<th>LT</th>
					<th>LB</th>
					<th>Customer</th>
					<th>Tagihan</th>
					<th>Unit</th>
					<th class="hide-search">Option</th>
				</tr>
			</tfoot>
			<thead>
				<tr>
					<th>#</th>
					<th width="200">Project</th>
					<th>Kawasan</th>
					<th>Unit</th>
					<th class="no-sort">LT</th>
					<th class="no-sort">LB</th>
					<th width="200">Customer</th>
					<th width="100">Tagihan</th>
					<th width="100">Unit</th>
					<th width="130" class="no-sort" style="text-align: center;">Option</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
@endsection

@push('custom_js')
<script>
	$(document).ready(function() {
		dataTable = $('#table-example').DataTable({
			"stateSave": false,
			"bAutoWidth": true,
			"responsive": true,
			"bDestroy": true,
			// "bFilter": false,
			// "bPaginate": false,
			"oLanguage": {
				"sLengthMenu": "_MENU_",
				"sSearchPlaceholder": "Search ...",
				"sZeroRecords": "<center>Data tidak ditemukan</center>",
				"sLoadingRecords": "Please wait - loading...",
				"oPaginate": {
					"sPrevious": "Prev",
					"sNext": "Next"
				},
			},
			"language": {
				"search": ""
			},
			"aaSorting": [
				[0, "desc"]
			],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			"preDrawCallback": function(settings) {},
			"drawCallback": function() {
				$('[data-bs-toggle="tooltip"]').tooltip();
				$('[data-bs-toggle="popover"]').popover();
			},
		});

		// column search
		$('#table-example tfoot th').each(function(k, v) {
			var title = $(this).text();
			$(this).html("<input type='text' id='" + k + "' class='form-control' placeholder='...' />");
		});

		// Apply the search
		dataTable.columns().every(function() {
			var pencarian = this;
			$('input', this.footer()).on('keyup change', function() {
				if (pencarian.search() !== this.value) {
					pencarian.search(this.value).draw();
				}
			});
		});
	});
</script>
@endpush()