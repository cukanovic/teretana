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
            <div class="list-group-item list-group-item-action" id="trainer-{{ $trainer->id }}">
                <div class="d-flex w-100 justify-content-between">
                    <a href="{{ route('admin.trainers.show', $trainer->id) }}">{{ $trainer->name }}</a>
                    <div class="justify-content-end">
                        <small class="text-muted">{{ trans_choice('second.list.relationship.count', $trainer->trainings_count, ['value' => $trainer->trainings_count]) }}</small>
                        @if($trainer->bookings_count < 1)
                            <br>
                            <button type="button" class="btn btn-danger" onclick="deleteTrainer({{ $trainer->id }})">Obriši trenera</button>
                        @endif
                    </div>
                </div>
            </div>
            <script>
                function deleteTrainer(trainerId) {
                    let url = '{{ route('api.trainers.delete', '#') }}'.replace('#', trainerId);
                    axios.delete(url).then(function () {
                        $(`#trainer-${trainerId}`).remove();
                    })
                }
            </script>
        @endforeach
    </div>
@endsection