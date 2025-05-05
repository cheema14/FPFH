@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <h3>{{ trans('details') }}</h3>
            <div class="user-details">
                <strong>{{ trans('cruds.user.fields.name') }}:</strong> {{ $user->name }}<br>
                <strong>{{ trans('cruds.user.fields.email') }}:</strong> {{ $user->email }}<br>
                <strong>{{ trans('cruds.user.fields.roles') }}:</strong>
                @foreach($user->roles as $key => $roles)
                    <span class="label label-info">{{ $roles->title }}</span>
                @endforeach
            </div>
            <h3>{{ trans('details') }}</h3>
            <div class="auth-details">
                <strong>{{ trans('cruds.user.fields.auth_user') }}:</strong> {{ auth()->user()->name }}<br>
                <strong>{{ trans('cruds.user.fields.auth_email') }}:</strong> {{ auth()->user()->email }}<br>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection