<!-- Site Breadcrumb Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/about-breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-text">
                    <h2>{{ $heading }}</h2>
                    <div class="site-breadcrumb">
                        @foreach($breadcrumbs as $url => $label)
                            <a href="{{ $url }}" class="sb-item">{{$label }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site Breadcrumb End -->