{{ $wrapContentInContainer = false }}
@extends('layouts.app')

@section('flash') @endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" type="text/css">
@endsection

@section('fonts')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
@endsection

@section('nav-component')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li @if(($activePage ?? '') == 'home') class="active" @endif><a href="{{ route('home') }}">Početna</a></li>
                        <li @if(($activePage ?? '') == 'trainings') class="active" @endif><a href="{{ route('trainings.index') }}">Treninzi</a></li>
                        <li @if(($activePage ?? '') == 'trainers') class="active" @endif><a href="{{ route('trainers.index') }}">Treneri</a></li>
                        @auth('web')
                            <li @if(($activePage ?? '') == 'bookings') class="active" @endif><a href="{{ route('bookings.index') }}">Moje rezervacije</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <a href="#" onclick="logout()">Odjavi se</a>
                                </form>
                                <script>
                                    function logout() {
                                        $('#logout-form').submit();
                                    }
                                </script>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Prijavi se</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    @include('layout.flash')
@endsection