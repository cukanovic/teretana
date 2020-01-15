@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ __('second.create.heading') }}</h1>
    </div>

    <form action="{{ route('admin.trainers.update', $trainer->id) }}" method="POST">
        @csrf
        @method('PATCH')

        @include('admin.trainers.fields')

        @include('layout.form_actions', [
            'submitText' => 'Sačuvaj',
            'cancelUrl' => route('admin.trainers.show', $trainer->id),
            'cancelText' => 'Otkaži',
        ])
    </form>
@endsection