@extends('trainer.layout.trainer')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>Moji treninzi</h1>
    </div>

    <div class="list-group">
        @foreach ($trainings as $training)
            <a href="{{ route('trainer.trainings.show', $training->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="list-group-item-heading justify-content-between">
                        {{ $training->name }}
                    </h4>
                    <small class="text-muted">{{ trans_choice('first.list.relationship.count', $training->bookings_count, ['value' => $training->bookings_count]) }}</small>
                </div>
                <p class="list-group-item-text">
                    {{ $training->trainer->name }}
                </p>
            </a>
        @endforeach
    </div>
@endsection