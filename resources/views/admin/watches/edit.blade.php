@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.watch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.watches.update", [$watch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.watch.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $watch->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sku_code">{{ trans('cruds.watch.fields.sku_code') }}</label>
                <input class="form-control {{ $errors->has('sku_code') ? 'is-invalid' : '' }}" type="text" name="sku_code" id="sku_code" value="{{ old('sku_code', $watch->sku_code) }}">
                @if($errors->has('sku_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sku_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.sku_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="size">{{ trans('cruds.watch.fields.size') }}</label>
                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="text" name="size" id="size" value="{{ old('size', $watch->size) }}">
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.watch.fields.details') }}</label>
                <input class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" type="text" name="details" id="details" value="{{ old('details', $watch->details) }}">
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color">{{ trans('cruds.watch.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $watch->color) }}">
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.watch.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $watch->price) }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.watch.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $watch->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.watch.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection