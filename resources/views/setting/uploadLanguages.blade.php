@extends('layouts.atllayout')

@section('content')
<!-- Form inputs -->
<!-- Form inputs -->
<div class="card">


    <div class="card-body">
        @if (isset($errorMessage))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $errorMessage }}</strong>
        </div>
        @endif
        <form method="POST" action="{{url('upload_language')}}" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <fieldset class="mb-3">
                <h4>{{ __("English") }} </h4>
                <div class="form-group row">
                    <label class="col-form-label col-lg-12">{{ __("This is default language") }} </label>
                </div>

                <h4 class="pt-2">{{ __("Italian") }} </h4>
                <div class="form-group row">
                    <label class="col-form-label col-lg-12">{{ __("Please select Json file") }}  (<code>.json</code>) {{ __("format") }} </label>
                    <div class="col-lg-12">
                        <input id="file" type="file" name="italianFile" value="" accept=".json"
                               class="form-control h-auto" >
                    </div>
                </div>
                
                {{ __("Click") }} <span onclick="document.getElementById('download-form').submit();" style="cursor: pointer"><code>{{ __("here") }}</code></span> {{ __("to download current language files") }}

            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">{{ __("Submit") }} <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
        
		<form id="download-form" action="{{route('download-language')}}"
			method="POST" style="display: none;">
			{{ csrf_field() }} <input type="hidden" name="fid" id="fid" value="0" />
		</form>


	</div>
</div>


@endsection
