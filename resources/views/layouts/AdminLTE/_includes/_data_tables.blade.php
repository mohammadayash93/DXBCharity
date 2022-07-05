{{-- @section('layout_css')

	<link rel="stylesheet" href="{{ asset('assets/plugins/dataTables/css/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/dataTables/css/buttons.dataTables.min.css') }}">

@endsection --}}

@section('head_js')
{{--
	<script src="{{ asset('assets/plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/vfs_fonts.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/dataTables/js/buttons.colVis.min.js') }}"></script> --}}
	<script>
		$(function (){
			var table = $('#tabelapadrao').DataTable({
				"order": [[ 0, "desc" ]],
				responsive: true,
				"language": {
					"sEmptyTable": "No Data Found",
					"sInfo": "Showing  _START_, _END_ of _TOTAL_ records",
					"sInfoEmpty": "Showing 0, 0 of 0 records",
					"sInfoFiltered": "(Filtered  _MAX_ records)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ Per Page",
					"sLoadingRecords": "Loading Records...",
					"sProcessing": "Processing...",
					"sZeroRecords": "No Data Found",
					"sSearch": "Search",
					"oPaginate": {
						"sNext": "Next",
						"sPrevious": "Previous",
						"sFirst": "First",
						"sLast": "Last"
					},
					"oAria": {
						"sSortAscending": ": Sort columns ascending",
						"sSortDescending": ": Sort columns descending"
					}
				},
				//responsive: true,

           		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

	            //"dom": 'Bfrtip',
	            //"buttons": ['pageLength', 'copy', 'excel', 'pdf', 'colvis',],
			});
		});
	</script>
	@yield('in_data_table')
@endsection
