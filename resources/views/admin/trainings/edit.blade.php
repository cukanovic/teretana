@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ $training->name }}</h1>
    </div>

    <form action="{{ route('admin.trainings.update', $training->id) }}" method="POST">
        @csrf
        @method('PATCH')

        @include('admin.trainings.fields')

        @include('layout.form_actions', [
            'submitText' => 'Sačuvaj',
            'cancelUrl' => route('admin.trainings.show', $training->id),
            'cancelText' => 'Otkaži',
        ])
    </form>
@endsection