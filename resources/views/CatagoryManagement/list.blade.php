@extends('layouts.atllayout', ['title' => 'Catagories', 'menukey' =>
'dataCenter']) @section('content')
<div class="card">
	<div class="card-body">
		<div class="top-card-button-wrapper">
			<a href="{{route('catagory-management/add')}}" type="button"
				class="btn btn-success btn-sm mb-2">Add New</a>
		</div>
		@if(isset($susscessMessage))
		<div class="alert alert-success" role="alert">{{$susscessMessage}}</div>
		@endif @if(isset($dangerMessage))
		<div class="alert alert-danger" role="alert">{{$dangerMessage}}</div>
		@endif @if(isset($warningMessage))
		<div class="alert alert-warning" role="alert">{{$warningMessage}}</div>
		@endif
		<table class="table datatable-button-html5-basic">
			<thead>
				<tr class="bg-primary border border-secondary text-white">
					<th scope="col" style="width: 10px" class="text-center">No</th>
					<th scope="col" style="width: 250px" class="text-center">Catagory name</th>
					<th scope="col" style="width: 250px" class="text-center">Menu name</th>
					<th scope="col" style="width: 100px" class="text-center"></th>
				</tr>
			</thead>
			<tbody class="table-bordered">
				@foreach ($list as $indexKey => $item)
				<tr>
					<td class="align-middle text-center" style="width: 10px">
						{{$indexKey}}
					</td>
					
					<td class="align-middle" style="width: 250px">
						{{$item->name}}
					</td>
					
					<td class="align-middle" style="width: 250px">
						{{$item->menu_name}}
					</td>
					
					<td class="align-middle" style="width: 100px">
						 <a
						href="{{route('catagory-management/edit',['id' => $item->id])}}"
						class="btn btn-sm btn-primary">Edit</a>
						<form method="POST" action="{{ route('catagory-management/delete') }}"
							style="display: inline-block">
							{{ csrf_field() }} <input type="hidden" name="id"
								value="{{$item->id}}" />
							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form> 
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
