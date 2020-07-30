@extends('layouts.atllayout', ['title' => $itemMenu->name, 'menukey' =>
'dataCenter']) @section('content')
<div class="card">
	<div class="card-body">
		<div class="top-card-button-wrapper">
			<a data-toggle="modal" data-target="#addNewCatagory"
				class="btn btn-success btn-sm mb-2" style="color:white">Add New Catagory</a>
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
    					<a href="javascript:void(0);" catagory-id="{{$item->id}}" class="dropdown-item img-edit"><i
    						class="mdi mdi-pencil mr-1"></i>Edit</a>
    					<!-- item-->
    					<a href="javascript:void(0);" catagory-id="{{$item->id}}" class="dropdown-item  img-delete"><i
    						class="mdi mdi-delete mr-1"></i>Delete</a>
    				</div>
    			</div>
<!--
				<div style="position: absolute; right: 0; top :0">
    				<img alt="" catagory-id="{{$item->id}}" class="img-edit" src="/public/img/icons-edit.png" style="height: 13px; cursor: pointer" />
					<img alt="" catagory-id="{{$item->id}}" class="img-delete" src="/public/img/icons-delete.png" style="height: 15px; cursor: pointer" />
     			</div> 
-->
				<p class="catagory_p">
					<a href="/catagory-management/show?id={{$item->id}}">{{$item->name}}</a>
				</p>
			</div>
		@endforeach
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNewCatagory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="max-width: 400px;">
    <div class="modal-content" style="height: 300px"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top: 0px">
      	<iframe src="/catagory-management/add?menu_id={{$itemMenu->id}}&popupMode=true" style="width: 100%; height:100%; overflow: hidden;" frameBorder="0"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editCatagory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="max-width: 400px;">
    <div class="modal-content" style="height: 300px"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-top: 0px">
      	<iframe id="editCatagoryFrame" src="" style="width: 100%; height:100%; overflow: hidden;" frameBorder="0"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="top-card-button-wrapper" >
	<button data-toggle="modal" data-target="#editCatagory" id="btnOpenEditModal" hidden
		class="btn btn-success btn-sm mb-2" style="color:white">Add New Catagory</button>
</div>
<script>
	$(".img-delete").click(function(){
		token = $('[name ="_token"]').val();
		catagory_id = $(this).attr("catagory-id");
		$.ajax({
			url: "/catagory-management/delete",
			type: "post",
		    data: {_token : token, id : catagory_id},
			success: function(result){
				location.reload();
		  }});
	});

	$(".img-edit").click(function(){
		catagory_id = $(this).attr("catagory-id");
		$('#btnOpenEditModal').trigger('click');
		$('#editCatagoryFrame').attr("src", "/catagory-management/edit?popupMode=true&id=" + catagory_id);
	});
	
	
	
</script>

@endsection
