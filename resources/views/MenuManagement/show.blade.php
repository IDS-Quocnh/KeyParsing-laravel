@extends('layouts.atllayout', ['title' => $itemMenu->name, 'menukey' =>
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
		@foreach ($list as $indexKey => $item)
			<div class="post-block">
				<p>
					{{$item->name}}
				</p>
			</div>
		@endforeach
		</table>
	</div>
</div>
@endsection
