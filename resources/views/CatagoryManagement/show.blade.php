@extends('layouts.atllayout', ['title' => $itemCatagory->name, 'menukey' =>
'dataCenter']) @section('content')
<div class="card">
	<div class="card-body">
		<div class="top-card-button-wrapper">
			<a href="{{route('post-management/add')}}" type="button"
				class="btn btn-success btn-sm mb-2">Add New Post</a>
		</div>
		@if(isset($susscessMessage))
		<div class="alert alert-success" role="alert">{{$susscessMessage}}</div>
		@endif @if(isset($dangerMessage))
		<div class="alert alert-danger" role="alert">{{$dangerMessage}}</div>
		@endif @if(isset($warningMessage))
		<div class="alert alert-warning" role="alert">{{$warningMessage}}</div>
		@endif
		<div class="post-block"></div>
		@foreach ($list as $indexKey => $item)
			<div class="post-block">
				<p class="catagory_p">
					<a href="/catagory-management/show?id={{$item->id}}">{{$item->name}}</a>
				</p>
			</div>
		@endforeach
	</div>
</div>
@endsection
