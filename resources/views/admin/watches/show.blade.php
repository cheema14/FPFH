@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.watch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.watches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.id') }}
                        </th>
                        <td>
                            {{ $watch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.title') }}
                        </th>
                        <td>
                            {{ $watch->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.sku_code') }}
                        </th>
                        <td>
                            {{ $watch->sku_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.size') }}
                        </th>
                        <td>
                            {{ $watch->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.details') }}
                        </th>
                        <td>
                            {{ $watch->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.color') }}
                        </th>
                        <td>
                            {{ $watch->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.price') }}
                        </th>
                        <td>
                            {{ $watch->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.watch.fields.category') }}
                        </th>
                        <td>
                            {{ $watch->category->category_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.watches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection