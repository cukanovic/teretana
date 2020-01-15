@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ __('second.heading') }}</h1>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.trainers.create') }}" class="btn btn-success my-1">{{ __('second.create.cta') }}</a>
    </div>

    <div class="list-group">
        @foreach ($trainers as $trainer)
            <a href="{{ route('admin.trainers.show', $trainer->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    {{ $trainer->name }}
                    <small class="text-muted">{{ trans_choice('second.list.relationship.count', $trainer->trainings_count, ['value' => $trainer->trainings_count]) }}</small>
                </div>
            </a>
        @endforeach
    </div>
@endsection