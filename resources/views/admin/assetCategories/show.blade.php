@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetCategory.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $assetCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $assetCategory->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">
                <a class="active nav-link nav-item" data-toggle="tab" href="#Asset">
                    Asset
                </a>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="Asset">
                @includeIf('admin.assetCategories.relationships.assets', ['assets' => $assetCategory->assets])
            </div>
        </div>
    </div>
</div>
@endsection