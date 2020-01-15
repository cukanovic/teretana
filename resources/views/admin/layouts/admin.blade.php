@extends('layouts.app')

@section('nav')
    <a class="dropdown-item" href="{{ route('admin.trainings.index') }}">{{ __('nav.admin.first') }}</a>
    <a class="dropdown-item" href="{{ route('admin.trainers.index') }}">{{ __('nav.admin.second') }}</a>
    <a class="dropdown-item" href="{{ route('admin.bookings.index') }}">{{ __('nav.admin.third') }}</a>

    <a class="dropdown-item" href="{{ route('admin.logout') }}"
       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('homeUrl', route('admin.dashboard'))