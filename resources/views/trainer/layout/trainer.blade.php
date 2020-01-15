@extends('layouts.app')

@section('nav')
    <a class="dropdown-item" href="{{ route('trainer.trainings.index') }}">{{ __('nav.trainer.first') }}</a>
    <a class="dropdown-item" href="{{ route('trainer.bookings.index') }}">{{ __('nav.trainer.second') }}</a>

    <a class="dropdown-item" href="{{ route('trainer.logout') }}"
       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('homeUrl', route('trainer.dashboard'))