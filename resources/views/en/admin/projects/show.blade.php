@extends('admin.layouts.main')

@section('title',__('admin.show-projects'))

@section('content')
    @include('admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('projects.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('projects.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('projects.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('projects-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.projects-title') }}</th>
            <td>{{ $main->title }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.projects-url') }}</th>
            <td>{{ $main->url }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.projects-status') }}</th>
            <td>
                @if($main->status)
                    {{ __('admin.enabled') }}
                @else
                    {{ __('admin.disabled') }}
                @endif
            </td>
        </tr>
    </table>
@endsection