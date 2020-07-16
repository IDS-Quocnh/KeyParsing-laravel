@extends('layouts.atllayout')

@section('content')


        <!-- Ajax sourced data -->
        <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Fine Information</h5>
						
					
          
          </div>

          <table class="table datatable-html">
						<thead>
							<tr>
				                <th>File Name</th>
				                <th class="text-center">File Point</th>
				            </tr>
						</thead>
						<tbody>
            @foreach ($cvs as $cv)
   

							<tr>
				                <td>{{$cv->file_name}}</td>
				                <td class="text-center">{{$cv->pt}}</td>
								
				            </tr>

                    @endforeach 
				            
						</tbody>
					</table>
				

				</div>
				<!-- /ajax sourced data -->


        <!-- Ajax sourced data -->
        <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Point Distribution</h5>
						
					
          
          </div>

          <table class="display nowrap table datatable-button-html5-basic" data-page-length='50'>
						<thead>
							<tr>
				                <th>Keyword</th>
				                <th class="text-center">Weight</th>
				                <th >Mathc Type</th>
				                <th class="text-center">Number of Match</th>
				                <th class="text-center">Point</th>
				            </tr>
						</thead>
						<tbody>
            @foreach ($pts as $cv)
   

							<tr>
				                <td>{{$cv->keyw}}</td>
				                <td class="text-center">{{$cv->wgt}}</td>
				                <td >{{$cv->mt}}</td>
				                <td class="text-center">{{$cv->kn}}</td>
				                <td class="text-center">{{$cv->pt}}</td>
								
				            </tr>

                    @endforeach 
				            
						</tbody>
					</table>
				

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
			search: '<span>Filter:</span> _INPUT_',
			searchPlaceholder: 'Type to filter...',
			lengthMenu: '<span>Show:</span> _MENU_',
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
		"order": [[ 4, "desc" ]],
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
