@extends('customer.layout.customer', ['activePage' => 'home'])

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="{{  asset('img/slider-bg-1.jpg') }}">
                <div class="container">
                    <div class="hero-text">
                        <h4>Lični treninzi</h4>
                        <h1>Make it <span>Shape</span></h1>
                        <a href="{{ route('register') }}" class="primary-btn">Učlani me</a>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="{{ asset('img/slider-bg-2.jpg') }}">
                <div class="container">
                    <div class="hero-text">
                        <h4>Nutricionizam</h4>
                        <h1>Make it <span>Shape</span></h1>
                        <a href="{{ route('register') }}#" class="primary-btn">Učlani me</a>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="{{ asset('img/slider-bg-3.jpg') }}">
                <div class="container">
                    <div class="hero-text">
                        <h4>Praćenje napretka</h4>
                        <h1>Make it <span>Shape</span></h1>
                        <a href="{{ route('register') }}" class="primary-btn">Učlani me</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Naši treninzi</h2>
                        <p>Naši fitnes eksperti ti mogu pomoći da otkriješ nove tehnike i vežbe koje nude dinamične i efikasne vežbe celog tela.</p>
                    </div>
                    <div class="services-items">
                        @foreach($trainings as $index => $training)
                            <a href="{{ route('trainings.show', $training->id) }}">
                                <div class="single-service-item color-{{ $index }}">
                                    <img src="{{ asset("img/icon-" . ++$index . ".png") }}" alt="">
                                    <h5>{{ Str::limit($training->name, 11, '...') }}</h5>
                                    <p>
                                        {{ Str::limit($training->description, ($index == 0) ? 82 : 84, '...') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="service-video set-bg" data-setbg="{{ asset('img/video-bg.jpg') }}">
                        <div class="play-btn">
                            <a href="https://www.youtube.com/watch?v=SlPhMPnQ58k" class="service-video-popup"><i
                                        class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('trainings.index') }}" class="primary-btn">Vidi sve <i class="ti-angle-double-right"></i></a>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Cta Section Begin -->
    <section class="cta-section set-bg spad" data-setbg="{{ asset('img/cta-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Započni svoje putovanje jednom od naših uzbudljivih ponuda</h2>
                    <p>Postani najbolja verzija sebe i ostvari svoj potpun potencijal.</p>
                    <a href="{{ route('register') }}" class="primary-btn">Pridruži nam se</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Naši treneri</h2>
                        <p>Naši treneri su tu da ti pomognu da budeš bolji.</p>
                    </div>
                    <a href="{{ route('trainers.index') }}" class="primary-btn">Vidi sve <i class="ti-angle-double-right"></i></a>
                </div>
            </div>
            <div class="team-members">
                <div class="row m-0">
                    <div class="col-lg-4 order-lg-1 p-0">
                        <div class="member-pic first">
                            <img src="{{ asset('img/trainer-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-2 p-0">
                        <div class="member-text">
                            <h5>{{ $trainer1->name }}</h5>
                            <p>{{ $trainer1->description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-3 p-0">
                        <div class="member-pic second">
                            <img src="{{ asset('img/trainer-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-6 p-0">
                        <div class="member-text second">
                            <h5>{{ $trainer2->name }}</h5>
                            <p>{{ $trainer2->description }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-5 p-0">
                        <div class="member-pic third">
                            <img src="{{ asset('img/trainer-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-4 p-0">
                        <div class="member-text third">
                            <h5>{{ $trainer3->name }}</h5>
                            <p>{{ $trainer3->description }}!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->
@endsection
