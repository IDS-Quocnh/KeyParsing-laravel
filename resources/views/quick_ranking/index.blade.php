@extends('layouts.atllayout')

@section('content')
<!-- Form inputs -->
<!-- Form inputs -->
<div class="card">
					

					<div class="card-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">ﾃ�</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif


            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">ﾃ�</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="POST" action="{{url('quick-ranking')}}" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
						
							<fieldset class="mb-3">

								<div class="form-group row">
									<label class="col-form-label col-lg-12">{{ __("Please select multiple CVs in Word") }} (<code>.doc</code>/ <code>.docx</code>) {{ __("or") }} PDF (<code>.pdf</code>) {{ __("format") }} </label>
									<div class="col-lg-12">
                    <input id="file" type="file" name="cv_files[]" value=""  
                     class="form-control h-auto" required multiple = "multiple" accept=".pdf,.doc,.docx" />
           
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-12">{{ __("Please select file containing Keywords with Weight in Excel") }} (<code>.xls</code>/ <code>.xlsx</code>)  {{ __("format") }}    </label>
									<div class="col-lg-12">
									<input id="file" type="file" name="weight_file" value=""  accept=".xls,.xlsx" 
                     class="form-control h-auto" required>
           
									</div>
								</div>

							</fieldset>
              

							<div class="text-right">
								<button type="submit" class="btn btn-primary">{{ __("Rank Them ") }}<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /form inputs -->


@endsection
