@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{ __('second.create.heading') }}</h1>
    </div>

    <form action="{{ route('admin.trainers.store') }}" method="POST">
        @csrf
        @include('admin.trainers.fields')
        @include('layout.form_actions', [
            'submitText' => __('second.create.submitCta'),
            'cancelUrl' => route('admin.trainers.index'),
            'cancelText' => __('second.create.cancelCta'),
        ])
    </form>
@endsection