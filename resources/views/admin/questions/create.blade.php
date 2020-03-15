@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.questions.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.question.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($question) ? $question->title : '') }}" required>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                <label for="text">{{ trans('cruds.question.fields.text') }}*</label>
                <textarea type="text" id="text" name="text" class="form-control" value="{{ old('text', isset($question) ? $question->text : '') }}" required></textarea>
                @if($errors->has('text'))
                    <p class="help-block">
                        {{ $errors->first('text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.text_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
