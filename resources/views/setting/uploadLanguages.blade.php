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
                <h4>English </h4>
                <div class="form-group row">
                    <label class="col-form-label col-lg-12">Please select Json file (<code>.json</code>)
                        format </label>
                    <div class="col-lg-12">
                        <input id="file" type="file" name="englishFile" value=""
                               class="form-control h-auto" accept=".json" />

                    </div>
                </div>

                <h4 class="pt-2">Italian </h4>
                <div class="form-group row">
                    <label class="col-form-label col-lg-12">Please select Json file (<code>.json</code>) format </label>
                    <div class="col-lg-12">
                        <input id="file" type="file" name="italianFile" value="" accept=".json"
                               class="form-control h-auto" >

                    </div>
                </div>

            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>


    </div>
</div>


@endsection
