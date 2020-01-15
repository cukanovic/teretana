@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $trainer->name }} | Trener</h1>
    </div>

    <div class="mb-3">
        Ime: {{ $trainer->name }}
    </div>

    <div class="mb-5">
        Email: {{ $trainer->email }}
    </div>

    <div class="mb-5 d-flex">
        <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-info">Izmeni trenera</a>
        <div class="ml-3">
            <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Obriši trenera</button>
            </form>
        </div>
    </div>

    <div class="mb-2 d-flex justify-content-center">
        <h2>Treninzi</h2>
    </div>

    @foreach ($trainer->trainings as $training)
        <a href="{{ route('admin.trainings.show', $training->id) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="list-group-item-heading justify-content-between">
                    {{ $training->name }}
                </h4>
                <small class="text-muted">{{ trans_choice('first.list.relationship.count', $training->bookings_count, ['value' => $training->bookings_count]) }}</small>
            </div>
        </a>
    @endforeach
@endsection