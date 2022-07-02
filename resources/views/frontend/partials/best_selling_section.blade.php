@php
$best_selers = Cache::remember('best_selers', 86400, function () {
return \App\Models\Shop::where('verification_status', 1)->orderBy('num_of_sale', 'desc')->take(20)->get();
});   
@endphp

@if (get_setting('vendor_system_activation') == 1)

<style>

    .section-doctor {
        /*background-color: #f8f9fa;*/
        padding: 80px 0;
    }

    .section-header {
        margin-bottom: 60px;
    }
    .section-header h2 {
        font-size: 36px;
        margin-bottom: 0;
        font-weight: 500;
    }
    .section-header .sub-title {
        color: #757575;
        font-size: 16px;
        max-width: 600px;
        margin: 15px auto 0;
    }
    .section-header p {
        color: #757575;
        font-size: 16px;
        margin-bottom: 0;
        margin-top: 15px;
    }
    .section-doctor .section-header {
        margin-bottom: 30px;
    }
    .section-doctor .section-header p {
        margin-top: 10px;
    }
    .doctor-slider .slick-slide{
        display: block;
        margin-left: 0;
        padding: 10px;
        width: 280px;
    }

    .section-doctor .profile-widget {
        box-shadow: 2px 2px 13px rgba(0, 0, 0, 0.1);
        margin-bottom: 0;
    }

    .profile-widget {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        border-radius: 4px;
        margin-bottom: 30px;
        position: relative;
        -webkit-transition: all .3s ease 0s;
        -moz-transition: all .3s ease 0s;
        -o-transition: all .3s ease 0s;
        transition: all .3s ease 0s;
        padding: 15px;
    }

    .about-content p {
        font-size: 14px;
        font-weight: 400;
        line-height: 26px;
        margin: 0;
    }
    .about-content p + p {
        margin-top: 20px;
    }
    .about-content a {
        background-color: #14a800;
        border-radius: 4px;
        color: #fff;
        display: inline-block;
        font-size: 16px;
        font-weight: 500;
        margin-top: 30px;
        min-width: 150px;
        padding: 10px 15px;
        text-align: center;
    }

    .about-content a:hover, .about-content a:focus {
        background-color: #14a800;
        border-color: #14a800;
        color: #fff;
    }


    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
        width: 100%;
    }
    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus {
        outline: none;
    }
    .slick-list.dragging {
        cursor: pointer;
    }
    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .slick-track:before,
    .slick-track:after {
        display: table;
        content: '';
    }
    .slick-track:after {
        clear: both;
    }
    .slick-loading .slick-track {
        visibility: hidden;
    }
    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
        transition: all ease-in-out .3s;
        opacity: 1;
    }
    [dir='rtl'] .slick-slide {
        float: right;
    }
    .slick-slide img {
        display: block;
    }
    .slick-slide.slick-loading img {
        display: none;
    }
    .slick-slide.dragging img {
        pointer-events: none;
    }
    .slick-initialized .slick-slide {
        display: block;
    }
    .slick-loading .slick-slide {
        visibility: hidden;
    }
    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
        display: none;
    }
    .slick-prev,
    .slick-next {
        font-size: 0;
        line-height: 0;
        position: absolute;
        top: 50%;
        display: block;
        width: 40px;
        height: 40px;
        padding: 0;
        -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
        transform: translate(0, -50%);
        box-shadow: 1px 6px 14px rgba(0,0,0,0.2);
        background: #fff;
        border-radius: 100%;	
        cursor: pointer;	
        border: none;
        outline: none;
        background: #fff;
    }
    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus {
        background-color: #14a800;
        color: #fff;
        opacity: 1;
    }
    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before {
        color: #fff;
        opacity: 1;
    }
    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before {
        opacity: .25;
    }
    .slick-prev:before,
    .slick-next:before {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;
        opacity: .75;
        color: #383838;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .slick-prev {
        left: 0;
        z-index:1;
    }
    [dir='rtl'] .slick-prev {
        right: -25px;
        left: auto;
    }
    .slick-prev:before {
        content: 'â†�';
    }
    [dir='rtl'] .slick-prev:before {
        content: 'â†’';
    }
    .slick-next {
        right: 0;
    }
    [dir='rtl'] .slick-next {
        right: auto;
        left: -25px;
    }
    .slick-next:before {
        content: 'â†’';
    }
    [dir='rtl'] .slick-next:before {
        content: 'â†�';
    }

    .slick-prev::before {
        content: "←";
    }
    .slick-next::before {
        content: "→";
    }


    .doc-img {
        position: relative;
        overflow: hidden;
        z-index: 1;
        border-radius: 4px;
    }
    .doc-img img {
        border-radius: 4px;
        transform: translateZ(0);
        transition: all 2000ms cubic-bezier(.19,1,.22,1) 0ms;
        width: 100%;
    }
    .doc-img:hover img {
        -webkit-transform: scale(1.15);
        -moz-transform: scale(1.15);
        transform: scale(1.15);
    }
    .profile-widget .fav-btn {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: #fff;
        width: 30px;
        height: 30px;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        justify-content: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        border-radius: 3px;
        color: #2E3842;
        -webkit-transform: translate3d(100%, 0, 0);
        -ms-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        opacity: 0;
        visibility: hidden;
        z-index: 99;
    }
    .profile-widget:hover .fav-btn {
        opacity: 1;
        visibility: visible;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .profile-widget .fav-btn:hover {
        background-color: #fb1612;
        color: #fff;
    }


    .pro-content {
        padding: 15px 0 0;
    }
    .pro-content .title {
        font-size: 17px;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .profile-widget .pro-content .title a {
        display: inline-block;
    }

    .profile-widget .verified {
        color: #28a745;
        margin-left: 3px;
    }

    .profile-widget p.speciality {
        font-size: 13px;
        color: #757575;
        margin-bottom: 5px;
        min-height: 40px;
    }


    .profile-widget .rating {
        color: #757575;
        font-size: 14px;
        margin-bottom: 15px;
    }
    .profile-widget .rating i {
        font-size: 14px;
    }
    .rating i.filled {
        color: #f4c150;
    }

    .available-info {
        font-size: 13px;
        color: #757575;
        font-weight: 400;
        list-style: none;
        padding: 0;
        margin-bottom: 15px;
    }
    .available-info li + li {
        margin-top: 5px;
    }
    .available-info li i {
        width: 22px;
    }


    .row.row-sm {
        margin-left: -3px;
        margin-right: -3px;
    }
    .row.row-sm > div {
        padding-left: 3px;
        padding-right: 3px;
    }
    .view-btn {
        color: #14a800;
        font-size: 13px;
        border: 2px solid #14a800;
        text-align: center;
        display: block;
        font-weight: 500;
        padding: 6px;
    }
    .view-btn:hover, .view-btn:focus {
        background-color: #14a800;
        color: #fff;
    }
    .book-btn {
        background-color: #14a800;
        border: 2px solid #14a800;
        color: #fff;
        font-size: 13px;
        text-align: center;
        display: block;
        font-weight: 500;
        padding: 6px;
    }
    .book-btn:hover, .book-btn:focus {
        background-color: #14a800;
        border-color: #14a800;
        color: #fff;
    }

    @media only screen and (max-width: 991.98px) {
        .about-content {
            margin-bottom: 30px;
        }
    }

    @media only screen and (max-width: 767.98px) {

        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }
        .profile-sidebar {
            margin-bottom: 20px;
        }
        .doctor-slider {
            margin-top: 25px;
        }
        .section-header h2 {
            font-size: 1.875rem;
        }
        .section-header .sub-title {
            font-size: 0.875rem;
        }
        .section-header p {
            font-size: 0.9375rem;
        }
        .about-content a {
            padding: 12px 20px;
        }
    }
</style>
@if(count($best_selers))
<section class="section111 section-doctor">
    <div class="container">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2 class="h5 fw-700 mb-0">Best Sellers</h2>
                        <p>Lorem Ipsum is simply dummy text </p>
                    </div>
                    <div class="about-content">
                        <p>The point of using Lorem Ipsum.</p>
                        <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
                        <a href="{{ route('sellers') }}">{{ translate('View All Sellers') }}</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">

                        @foreach ($best_selers as $key => $seller)
                        @if ($seller->user != null)
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{ route('shop.visit', $seller->slug) }}">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                         data-src="@if ($seller->logo !== null) {{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                         alt="{{ $seller->name }}"
                                         class="img-fluid lazyload">
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="{{ route('shop.visit', $seller->slug) }}">{{ $seller->name }}</a> 
                                </h3>
                                @if(!empty($seller->live_location))
                                <p class="speciality">{{ $seller->live_location }}</p>
                                @endif
                                <div class="rating">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($seller->rating >= $i) {
                                            ?>
                                            <i class="fas fa-star filled"></i>
                                        <?php } else { ?>
                                            <i class="fas fa-star"></i>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <span class="d-inline-block average-rating">({{ renderStarRating($seller->rating) }})</span>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="{{ route('shop.visit', $seller->slug) }}" class="btn view-btn">{{ translate('Visit Store') }}</a>
                                    </div>
                                    <!--                                    <div class="col-6">
                                                                            <a href="#" class="btn book-btn">Book Now</a>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
<?php
/* <section class="mb-4">
  <div class="container">
  <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
  <div class="d-flex mb-3 align-items-baseline border-bottom">
  <h3 class="h5 fw-700 mb-0">
  <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Best Sellers')}}</span>
  </h3>
  <a href="{{ route('sellers') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Sellers') }}</a>
  </div>
  <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-lg-items="3"  data-md-items="2" data-sm-items="2" data-xs-items="1" data-rows="2">
  @foreach ($best_selers as $key => $seller)
  @if ($seller->user != null)
  <div class="carousel-box">
  <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
  <div class="col-4">
  <a href="{{ route('shop.visit', $seller->slug) }}" class="d-block p-3">
  <img
  src="{{ static_asset('assets/img/placeholder.jpg') }}"
  data-src="@if ($seller->logo !== null) {{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
  alt="{{ $seller->name }}"
  class="img-fluid lazyload"
  >
  </a>
  </div>
  <div class="col-8 border-left border-light">
  <div class="p-3 text-left">
  <h2 class="h6 fw-600 text-truncate">
  <a href="{{ route('shop.visit', $seller->slug) }}" class="text-reset">{{ $seller->name }}</a>
  </h2>
  <div class="rating rating-sm mb-2">
  {{ renderStarRating($seller->rating) }}
  </div>
  <a href="{{ route('shop.visit', $seller->slug) }}" class="btn btn-soft-primary btn-sm">
  {{ translate('Visit Store') }} <i class="las la-angle-right"></i>
  </a>
  </div>
  </div>
  </div>
  </div>
  @endif
  @endforeach
  </div>
  </div>
  </div>
  </section> */
?>
<script>
    if ($('.doctor-slider').length > 0) {
        $('.doctor-slider').slick({
            dots: false,
            autoplay: false,
            infinite: true,
            variableWidth: true,
        });
    }
</script>
@endif
