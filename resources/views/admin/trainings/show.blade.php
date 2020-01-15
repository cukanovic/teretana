@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $training->name }}</h1>
    </div>

    <div class="mb-3">
        {{ __('first.fields.descriptionLabel') }}:
        <p>
            {{ $training->description }}
        </p>
    </div>

    <div class="mb-3">
        {{ __('first.fields.priceLabel') }}: {{ $training->price }}
    </div>

    <div class="mb-3">
        {{ __('first.fields.countLabel') }}: {{ $training->number_of_sessions }}
    </div>

    <div class="mb-3">
        {{ __('first.fields.enumLabel') }}: {{ $training->difficulty }}
    </div>

    <div class="mb-3">
        {{ __('first.fields.relationshipLabel') }}:
        <a href="{{ route('admin.trainers.show', $training->trainer->id) }}">{{ $training->trainer->name }}</a>
    </div>

    <div class="mb-3 d-flex">
        <a href="{{ route('admin.trainings.edit', $training->id) }}" class="btn btn-info">Izmeni trening</a>
        @if ($training->canBeDeleted())
            <div class="ml-3">
                <form action="{{ route('admin.trainings.destroy', $training->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Obriši trening</button>
                </form>
            </div>
        @endif
    </div>
@endsection