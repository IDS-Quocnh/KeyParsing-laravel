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
        <form method="POST" action="{{url('keyword-parsing')}}" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <fieldset class="mb-3">

                <div class="form-group row">
                    <label class="col-form-label col-lg-12">Please select word file (<code>.doc</code>/ <code>.docx</code>)
                        format </label>
                    <div class="col-lg-12">
                        <input id="file" type="file" name="wordFile" value=""
                               class="form-control h-auto" accept=".doc,.docx" required/>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-12">Please select file containing Keywords in Excel
                        (<code>.xls</code>/ <code>.xlsx</code>) format </label>
                    <div class="col-lg-12">
                        <input id="file" type="file" name="excelFile" value="" accept=".xls,.xlsx"
                               class="form-control h-auto" required>

                    </div>
                </div>

            </fieldset>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>


    </div>
</div>
@if (isset($keywordList))
<div class="card">
    <div class="card-body">
        <table class="table datatable-button-html5-basic" data-page-length='50'>
            <thead>
                <tr>
                    <th class="text-center bold">Keyword</th>
                </tr>
            </thead>
            <tbody>
            @php ($i = 0)
            @foreach ($keywordList as $keywordItem)
            @php ($i = $i+1)
                 @if ($keywordItem['exits'])
                <tr>
                    <td>{{$keywordItem['keyword']}}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<!-- /form inputs -->


@endsection
