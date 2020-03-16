@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.texts.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                    <label for="bio">{{ trans('cruds.texts.fields.bio') }}*</label>
                    <textarea type="text" id="bio" name="bio" class="form-control" required>{{ old('bio', isset($texts['bio']->value) ? $texts['bio']->value : '') }}</textarea>
                    @if($errors->has('bio'))
                        <p class="help-block">
                            {{ $errors->first('bio') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.texts.fields.bio_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">{{ trans('cruds.texts.fields.phone') }}*</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($texts['phone']->value) ? $texts['phone']->value : '') }}" required>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.texts.fields.phone_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('mail') ? 'has-error' : '' }}">
                    <label for="mail">{{ trans('cruds.texts.fields.mail') }}*</label>
                    <input type="text" id="mail" name="mail" class="form-control" value="{{ old('mail', isset($texts['mail']->value) ? $texts['mail']->value : '') }}" required>
                    @if($errors->has('mail'))
                        <p class="help-block">
                            {{ $errors->first('mail') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.texts.fields.mail_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                    <label for="instagram">{{ trans('cruds.texts.fields.instagram') }}*</label>
                    <input type="text" id="instagram" name="instagram" class="form-control" value="{{ old('instagram', isset($texts['instagram']->value) ? $texts['instagram']->value : '') }}" required>
                    @if($errors->has('instagram'))
                        <p class="help-block">
                            {{ $errors->first('instagram') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.texts.fields.instagram_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                    <label for="facebook">{{ trans('cruds.texts.fields.facebook') }}*</label>
                    <input type="text" id="facebook" name="facebook" class="form-control" value="{{ old('facebook', isset($texts['facebook']->value) ? $texts['facebook']->value : '') }}" required>
                    @if($errors->has('facebook'))
                        <p class="help-block">
                            {{ $errors->first('facebook') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.texts.fields.facebook_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
