@extends('layouts.atllayout')

@section('content')
				<div class="card">
                
					<div class="row" style="padding:15px">
                    <div class="col-lg-12">
					<table class="display nowrap table datatable-button-html5-basic" style="width:100%" id="rankDataTable">
						<thead>
							<tr>
				                <th class="text-center">Rank</th>
				                <th>File Name</th>
				                <th >File Type</th>
				                <th class="text-center">File Point</th>
				            </tr>
						</thead>
						<tbody>
            @php ($i = 0)
            @foreach ($cvs as $cv)
            @php ($i = $i+1)
   

							<tr>
				                <td class="text-center">{{$i}}</td>
				                <td>{{$cv->file_name}}</td>
				                <td >{{$cv->file_type}}</td>
				                <td class="text-center">{{$cv->pt}}</td>
								
				            </tr>

                    @endforeach 
				            
						</tbody>
					</table>
				</div>
</div>
				</div>
				<!-- /ajax sourced data -->


<script>


// Basic Datatable examples
var _componentDatatableButtonsHtml5 = function() {
	
	// Basic initialization
	$('.datatable-button-html5-basic').DataTable({
		buttons: {            
			dom: {
				button: {
					className: 'btn btn-light'
				}
			},
			buttons: [
			]
		}
	});
};


</script>
         

@endsection
