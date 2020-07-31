@extends('layouts.atllayout', ['title' => 'Search Result for: ' . $queryString , 'menukey' =>
'dataCenter']) @section('content')

{{ csrf_field() }}
<div class="card">
	<div class="card-body">
		@if(isset($susscessMessage))
		<div class="alert alert-success" role="alert">{{$susscessMessage}}</div>
		@endif @if(isset($dangerMessage))
		<div class="alert alert-danger" role="alert">{{$dangerMessage}}</div>
		@endif @if(isset($warningMessage))
		<div class="alert alert-warning" role="alert">{{$warningMessage}}</div>
		@endif
		<div class="post-block"></div>
		@foreach ($matchListPost as $indexKey => $item)
			<div class="post-block" style="position: relative;">
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
		
		@foreach ($matchDesPost as $indexKey => $item)
			<div class="post-block" style="position: relative;">
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
		
		@foreach ($contentMatchListPost as $indexKey => $item)
			<div class="post-block" style="position: relative;">
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
		
		@foreach ($matchSubDesPost as $indexKey => $item)
			<div class="post-block" style="position: relative;">
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
		
		@foreach ($subMatchListPost as $indexKey => $item)
			<div class="post-block" style="position: relative;">
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
	</div>
</div>

@endsection
