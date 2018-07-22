@extends('admin.layouts.main')

@section('title',__('admin.edit-projects'))

@section('content')
    @include('admin.includes.title')
    @include('admin.includes.error')
    <form action="{{ route('projects.update',$main->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>{{ __('admin.projects-title') }}</label>
            <input type="text" class="form-control" name="title" value="{{ $main->title }}"
                   placeholder="{{ __('admin.projects-enter-title') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('admin.projects-url') }}</label>
            <input type="text" class="form-control" name="url" value="{{ $main->url }}"
                   placeholder="{{ __('admin.projects-enter-url') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('admin.projects-status') }}</label>
            <select class="form-control" name="status" required>
                <option value="1">{{ __('admin.enabled') }}</option>
                <option value="0">{{ __('admin.disabled') }}</option>
            </select>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('admin.edit') }}</button>
    </form>
@endsection