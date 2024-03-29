@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asset.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.id') }}
                        </th>
                        <td>
                            {{ $asset->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.category') }}
                        </th>
                        <td>
                            {{ $asset->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.name') }}
                        </th>
                        <td>
                            {{ $asset->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.photos') }}
                        </th>
                        <td>
                            {{ $asset->photos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.notes') }}
                        </th>
                        <td>
                            {!! $asset->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.assigned_to') }}
                        </th>
                        <td>
                            {{ $asset->assigned_to->name ?? '' }}
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
                <a class="active nav-link nav-item" data-toggle="tab" href="#AssetsHistory">
                    AssetsHistory
                </a>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="AssetsHistory">
                @includeIf('admin.assets.relationships.assetshistories', ['assetshistories' => $asset->assetshistories])
            </div>
        </div>
    </div>
</div>
@endsection
