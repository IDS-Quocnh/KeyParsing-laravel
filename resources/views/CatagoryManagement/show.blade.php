@extends('layouts.atllayout', ['title' => $itemCatagory->name, 'menukey' =>
'dataCenter']) @section('content')

{{ csrf_field() }}
<div class="card">
	<div class="card-body">
		<div class="top-card-button-wrapper" style="display: inline-block;">
            <a href="/menu-management/show?id={{$menu_id}}" type="button" class="btn btn-primary btn-sm mb-2">Back to Menu</a>
        </div>
		<div class="top-card-button-wrapper" style="display: inline-block;">
			<a data-toggle="modal" data-target="#addNewPost"
				class="btn btn-success btn-sm mb-2" style="color: white">Add New Post</a>
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
			<div class="post-block" style="position: relative;">
			
				<div class="dropdown float-right">
    				<a href="#" class="dropdown-toggle arrow-none card-drop"
    					data-toggle="dropdown" aria-expanded="false"> <i
    					class="dripicons-dots-3"></i>
    				</a>
    				<div class="dropdown-menu dropdown-menu-right" style="">
    					<!-- item-->
    					<a href="javascript:void(0);" post-id="{{$item->id}}" class="dropdown-item  img-delete"><i
    						class="mdi mdi-delete mr-1"></i>Delete</a>
    				</div>
    			</div>
    			
				<p class="catagory_p">
					<a href="/post-management/show?id={{$item->id}}" >{{$item->name}}</a>
					<br>
					{{$item->description}}
				</p>
			</div>
		@endforeach
	</div>
</div>
<script>
	$(".img-delete").click(function(){
		token = $('[name ="_token"]').val();
		post_id = $(this).attr("post-id");
		$.ajax({
			url: "/post-management/delete",
			type: "post",
		    data: {_token : token, id : post_id},
			success: function(result){
				location.reload();
		  }});
	});
</script>

<!-- Modal -->
<div class="modal fade" id="addNewPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="max-width: 1200px;">
    <div class="modal-content" style="height: 750px"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top: 0px">
      	<iframe src="/post-management/add?catagory_id={{$itemCatagory->id}}&popupMode=true" style="width: 100%; height:100%; overflow: hidden;" frameBorder="0"></iframe>
      </div>
    </div>
  </div>
</div>
@endsection
