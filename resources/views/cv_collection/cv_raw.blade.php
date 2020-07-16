@extends('layouts.atllayout')

@section('content')
<!-- Form inputs -->
<!-- Form inputs -->
<div class="card">
					

					<div class="card-body">
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('upload-error'))
            
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>File Upload Faild</strong>
                      @foreach ($message as $msg)
                      <br/>{{$msg}}
                      @endforeach 
              </div>
              
            @endif

            @if ($message = Session::get('upload-warning'))
            
            <div class="alert alert-primary alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              
              <strong>File Upload is partially successful</strong>
                      @foreach ($message as $msg)
                      <br/>{{$msg}}
                      @endforeach 
            </div>
            
          @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{url('cv-upload')}}" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
						
							<fieldset class="mb-1">

								<div class="form-group row">
									<label class="col-form-label col-lg-12">Please select multiple CVs in Word (<code>.doc</code>/ <code>.docx</code>) or PDF (<code>.pdf</code>) format </label>
									<div class="col-lg-12">
                    <input id="file" type="file" name="cv_files[]" value=""  
                     class="form-control h-auto" required multiple = "multiple" accept=".pdf,.doc,.docx" />
           
									</div>
								</div>


							</fieldset>
              

							<div class="text-right">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /form inputs -->


@endsection
