@extends('layouts.atllayout', ['title' => isset($item) ? 'Edit Post' : 'Add Post' ])

@section('content')
<div class="card">
	<div class="card-body">
        @if(isset($susscessMessage))
        <div class="alert alert-success" role="alert">
            {{$susscessMessage}}
        </div>
        @endif
        @if(isset($dangerMessage))
        <div class="alert alert-danger" role="alert">
            {{$dangerMessage}}
        </div>
        @endif
        @if(isset($warningMessage))
        <div class="alert alert-warning" role="alert">
            {{$warningMessage}}
        </div>
        @endif
    
        <div class="top-card-button-wrapper">
            <a href="{{route('post-management')}}" type="button" class="btn btn-primary btn-sm mb-2">back</a>
        </div>
    
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" {{ isset($item) ? 'action=' . route('post-management/edit') :'action=' . route('post-management/add')  }}  enctype="multipart/form-data" >
                            {{ csrf_field() }}
    
    
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Post Name</label>
    
                                <div class="col-md-12">
                                    <input id="id" type="hidden" class="form-control" name="id" value="{{isset($item) ? $item->id : ''}}" required autofocus>
                                    <input id="name" type="text" class="form-control" name="name" value="{{isset($item) ? $item->name : ''}}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>
    
                                <div class="col-md-12">
                                    <textarea id="description" class="form-control" name="description" style="height: 50px" required>{{isset($item) ? $item->description :''}} </textarea>
    
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Post Content</label>
    
                                <div class="col-md-12">
                                    <textarea id="content" class="form-control" name="content" style="height: 700px" required>{{isset($item) ? $item->content :''}}  </textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                             <script>
        								 $(document).ready(function() {
                                            $('#content').summernote();
                                        });
							 </script>
                            
                            <?php 
                                $listMenu = App\Model\Menu::orderBy('created_at', 'desc')->get();
                            ?>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="menu_id" class="col-md-4 control-label">Menu Name</label>
    
                                <div class="col-md-3">
									<select id="menu_id" class="form-control">
    									@foreach ($listMenu as $indexKey => $itemMenu)
    										<option value="{{$itemMenu->id}}" {{(isset($item) && $itemMenu->id == $item->menu_id) || (isset($menu_id) && $menu_id == $itemMenu->id) ? 'selected' : ''}}>{{$itemMenu->name}}</option>
                                		@endforeach
									</select> 
									@if ($errors->has('menu_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('menu_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <script>

                            	function sendGetCatagoryListByMenuItem(menu_id){
                            		$.ajax({
										url: "/getCatagoryByMenuId",
										type: "GET",
									    data: {id : menu_id},
										success: function(result){
											var parts = result.split("||");
											var optionStr = "";
											for(var i=0 ; i < parts.length - 1; i++){
												partss = parts[i].split(";");
												optionStr = optionStr + "<option value='" + partss[0] + "'>" + partss[1] + "</option>";
											}
											$("#catagory_id").html(optionStr);
									  }});
                            	}

                            	function sendFirstGetCatagoryListByMenuItem(menu_id){
                            		$.ajax({
										url: "/getCatagoryByMenuId",
										type: "GET",
									    data: {id : menu_id},
										success: function(result){
											var parts = result.split("||");
											var optionStr = "";
											var oldCatagoryId = "{{isset($item) ? $item->catagory_id : ''}}";
											for(var i=0 ; i < parts.length - 1; i++){
												partss = parts[i].split(";");
												optionStr = optionStr + "<option value='" + partss[0] + "' " ;
												if( oldCatagoryId == partss[0]){
													optionStr = optionStr + 'selected';
												}
												if('{{isset($catagory_id) ? $catagory_id : "null"}}' == partss[0]){
													optionStr = optionStr + 'selected';
												}
												optionStr = optionStr + ">" + partss[1] + "</option>";
											}
											$("#catagory_id").html(optionStr);
									  }});
                            	}

                            	@if(isset($listMenu) && sizeof($listMenu) > 0)
                            		setTimeout(function(){
										var menu_id = $("#menu_id").children("option:selected").val();
										sendFirstGetCatagoryListByMenuItem(menu_id);
									}, 200);
                            	@endif
                            	
								$("#menu_id").change(function(){
									var menu_id = $(this).children("option:selected").val();
									sendGetCatagoryListByMenuItem(menu_id);
									
								});
                            </script>
                            
                            
                            <div class="form-group{{ $errors->has('catagory_id') ? ' has-error' : '' }}">
                                <label for="menu_id" class="col-md-4 control-label">Catagory Name</label>
    
                                <div class="col-md-3">
									<select name="catagory_id" id="catagory_id" class="form-control" required>
									</select> 
									@if ($errors->has('catagory_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('catagory_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{isset($item) ? 'Edit submit' : 'Add'}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($popupMode))
<script>
	$(".navbar-custom").hide();
	$(".left-side-menu").hide();
	$(".page-title-box").hide();
	$(".top-card-button-wrapper").hide();
	$(".content-page").css("margin-left","0px");
	$(".content-page").css("margin-top","0px");
	$(".content-page").css("padding-left","0px");
	$(".content-page").css("padding-bottom","0px");
	$(".content-page").css("padding-right","0px");
	$(".content").css("padding-left","0px");
	$(".content").css("padding-top","0px");
	$(".content").css("padding-bottom","0px");
	$(".content").css("padding-right","0px");
	$(".container-fluid").css("padding-left","0px");
	$(".container-fluid").css("padding-right","0px");
	$("body").css("padding-bottom","0px");
	setTimeout(function(){ $("#lastfooter").hide(); }, 500);
	
	
</script>
@endif
@endsection
