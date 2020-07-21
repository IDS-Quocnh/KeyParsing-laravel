@extends('layouts.atllayout')

@section('content')

 
				<div class="card">
                
					<div class="row" style="padding:15px">
                    <div class="col-lg-12">
					<table class="table datatable-button-html5-basic" data-page-length='50'>
						<thead>
							<tr>
				                <th class="text-center">{{ __("Rank") }}</th>
				                <th>{{ __("File Name") }}</th>
				                <th class="text-center">{{ __("File Point") }}</th>
				                <th class="text-center">{{ __("Action") }}</th>
				            </tr>
						</thead>
						<tbody>
            @php ($i = 0)
            @foreach ($cvs as $cv)
            @php ($i = $i+1)
   

							<tr>
				                <td class="text-center">{{$i}}</td>
				                <td>{{$cv->file_name}}</td>
				                <td class="text-center">{{$cv->pt}}</td>
								<td class="text-center">
								<a target="_blank"
								 href="{{url('ranking-detail')}}?fid={{$cv->id}}&operationId={{$operationId}}" >
								  <i class="icon-list "></i> {{ __("Point Details") }}</a>
								  </td>
				            </tr>

                    @endforeach 
				            
						</tbody>
					</table>
				</div>
</div>
				</div>
				<!-- /ajax sourced data -->

<script>

var DatatableButtonsHtml5 = function() {


//
// Setup module components
//

// Basic Datatable examples
var _componentDatatableButtonsHtml5 = function() {
	if (!$().DataTable) {
		console.warn('Warning - datatables.min.js is not loaded.');
		return;
	}

	// Setting datatable defaults
	$.extend( $.fn.dataTable.defaults, {
		autoWidth: false,
		dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
		language: {
			search: '<span>{{ __("Filter") }}:</span> _INPUT_',
			searchPlaceholder: '{{ __("Type to filter...") }}',
			lengthMenu: '<span>{{ __("Show") }}:</span> _MENU_',
			paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
		}
	});


	// Basic initialization
	$('.datatable-button-html5-basic').DataTable({
		buttons: {            
			dom: {
				button: {
					className: 'btn btn-light'
				}
			}
		},
            "pageLength": 50,
            "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50, 100, "All"]]
	});




	
};

// Select2 for length menu styling
var _componentSelect2 = function() {
	if (!$().select2) {
		console.warn('Warning - select2.min.js is not loaded.');
		return;
	}

	// Initialize
	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity,
		dropdownAutoWidth: true,
		width: 'auto'
	});
};


//
// Return objects assigned to module
//

return {
	init: function() {
		_componentDatatableButtonsHtml5();
		_componentSelect2();
	}
}
}();





</script> 

@endsection
