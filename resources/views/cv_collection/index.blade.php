@extends('layouts.atllayout')

@section('content')
<style>
.margin-left-5{margin-left:5px !important}
</style>
				<div class="card">
                
					<div class="row" style="padding:15px">
                    <div class="col-lg-12">
					<table class="table datatable-button-init-custom">
					
						<thead>
							<tr>
				                <th>File Name</th>
				                <th>Upload Date</th>
				                <th>Actions</th>
				            </tr>
						</thead>
						<tbody>
            @foreach ($cvs as $cv)
   

							<tr>
				                <td>{{$cv->file_name}}</td>
				                <td>{{$cv->upd_dt}}</td>
								<td class="text-center">
										
											

											
												<!-- <a href="{{$cv->file_path}}" target="_blank" Download="{{$cv->file_name}}" 
                                                style="margin-right:10px;"><i class="icon-file-download"></i> Download</a>
												 -->
                                                <a href="#" style="color:red"
                                                onclick="event.preventDefault();DeleteSingleCV({{$cv->id}},'{{$cv->file_name}}');"
                                                
                                                
                                                ><i class="icon-bin color-red"></i> Delete</a>
											
										
									
								</td>
				            </tr>

                    @endforeach 
				            
						</tbody>
					</table>
				</div>
</div>
				</div>
				<!-- /ajax sourced data -->

				<a id="add-file-form" href="{{ url('cv-upload') }}"  style="display: none;">
                 </a>
				 <a id="add-file-form" href="{{ url('cv-upload-zip') }}"  style="display: none;">
                 </a>
				<form id="clear-file-form" action="{{ url('cv-clear') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
 <form id="download-form" action="{{route('download-zip')}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="fid" id="fid" value="0" />
                                        </form> 

                <form id="delete-cv-form" action="{{url('cv-delete')}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="fid" id="fid" value="0" />
                                        </form> 
				<script>

var DeleteSingleCV = function(fid, fname)
{

    bootbox.confirm({
                title: 'Confirm Delete',
                message: 'Are you sure to delete the file (' + fname + ')?',
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-primary'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-link'
                    }
                },
                callback: function (result) {
                    if(result)
                    {
                        document.getElementById('fid').value = fid;
                        document.getElementById('delete-cv-form').submit();
                    }
                }
            });
};

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





        // Custom button
        $('.datatable-button-init-custom').DataTable({
            buttons: [
                {
                    text: '<i class="icon-file-plus"></i> Add Files',
                    className: 'btn btn-primary mr-1',
                    action: function(e, dt, node, config) {
                        document.getElementById('add-file-form').click();
                    }
                },
		{
                    text: '<i class="icon-file-plus"></i> Download All',
                    className: 'btn btn-success mr-1',
                    action: function(e, dt, node, config) {
                        document.getElementById('download-form').submit();
                    }
                },
                {
                    text: '<i class="icon-trash mr-1"></i>Delete All',
                    className: 'btn btn-danger',
                    action: function(e, dt, node, config) {
                        bootbox.confirm({
                            title: 'Confirm Delete',
                            message: 'Are you sure to delete all the files?',
                            buttons: {
                                confirm: {
                                    label: 'Yes',
                                    className: 'btn-primary'
                                },
                                cancel: {
                                    label: 'Cancel',
                                    className: 'btn-link'
                                }
                            },
                            callback: function (result) {
                                if(result)
                                {
                                    document.getElementById('clear-file-form').submit();
                                }
                            }
                        });
                    }
                }
            ],
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
