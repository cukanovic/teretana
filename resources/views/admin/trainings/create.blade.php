@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ __('first.create.heading') }}</h1>
    </div>

    <form action="{{ route('admin.trainings.store') }}" method="POST">
        @csrf
        @include('admin.trainings.fields')
        @include('layout.form_actions', [
            'submitText' => __('first.create.submitCta'),
            'cancelUrl' => route('admin.trainings.index'),
            'cancelText' => __('first.create.cancelCta'),
        ])
    </form>
@endsection