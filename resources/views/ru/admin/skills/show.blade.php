@extends('admin.layouts.main')

@section('title',__('admin.show-skills'))

@section('content')
    @include('admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('skills.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('skills.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('skills.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('admin.skills-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.skills-title') }}</th>
            <td>{{ $main->title }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.skills-level') }}</th>
            <td>{{ $main->level }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.skills-status') }}</th>
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