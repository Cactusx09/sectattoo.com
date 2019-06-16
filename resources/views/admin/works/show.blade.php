@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.works.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.works.fields.image')</th>
                            <td field-key='image'>@if($work->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $work->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $work->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.works.fields.title')</th>
                            <td field-key='title'>{{ $work->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.works.fields.description')</th>
                            <td field-key='description'>{{ $work->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.works.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


