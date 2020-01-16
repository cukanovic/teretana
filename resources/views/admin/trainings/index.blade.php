@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ __('first.heading') }}</h1>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.trainings.create') }}" class="btn btn-success my-1">{{ __('first.create.cta') }}</a>
    </div>

    <div class="list-group">
        @foreach ($trainings as $training)
            <div class="list-group-item list-group-item-action" id="training-{{ $training->id }}">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="list-group-item-heading justify-content-between">
                        <a href="{{ route('admin.trainings.show', $training->id) }}">{{ $training->name }}</a>
                    </h4>
                    <div class="justify-content-end">
                        <small class="text-muted">{{ trans_choice('first.list.relationship.count', $training->bookings_count, ['value' => $training->bookings_count]) }}</small>
                        @if ($training->canBeDeleted())
                            <br>
                            <button type="button" class="btn btn-danger prevent-parent-click" onclick="deleteTraining({{ $training->id }})">Obriši trening</button>
                        @endif
                    </div>
                </div>
                <p class="list-group-item-text">
                    {{ $training->trainer->name }}
                </p>
            </div>
        @endforeach
    </div>
    <script>
        function deleteTraining(trainingId) {
            let url = '{{ route('api.trainings.delete', '#') }}'.replace('#', trainingId);
            window.axios.delete(url).then(function () {
                $(`#training-${trainingId}`).remove();
            });
        }
    </script>
@endsection