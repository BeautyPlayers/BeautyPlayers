@extends('frontend.layouts.app')

@section('content')

    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block ">{{ translate('1. My Cart')}}</h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-search-location"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block ">Nearby sellers</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block ">{{ translate('2. Shipping info')}}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('3. Delivery info')}}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('4. Payment')}}</h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 ">{{ translate('5. Confirmation')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="mb-4 gry-bg">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row cols-xs-space cols-sm-space cols-md-space">--}}
    {{--                <div class="col-xxl-8 col-xl-10 mx-auto">--}}
    {{--                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-lg-items="3"--}}
    {{--                         data-md-items="2" data-sm-items="2" data-xs-items="1" data-rows="2">--}}
    {{--                        @foreach ($nearby_sellers as $key => $seller)--}}
    {{--                            @if ($seller->user != null)--}}
    {{--                                <div class="carousel-box">--}}
    {{--                                    <div--}}
    {{--                                        class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">--}}
    {{--                                        <div class="col-12">--}}
    {{--                                            <a href="{{ route('shop.visit', $seller->slug) }}" class="d-block p-3">--}}
    {{--                                                <img--}}
    {{--                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"--}}
    {{--                                                    data-src="@if ($seller->logo !== null) {{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"--}}
    {{--                                                    alt="{{ $seller->name }}"--}}
    {{--                                                    class="img-fluid lazyload">--}}
    {{--                                            </a>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="col-8 border-left border-light">--}}
    {{--                                            <div class="p-3 text-left">--}}
    {{--                                                <h2 class="h6 fw-600 text-truncate">--}}
    {{--                                                    <a href="{{ route('shop.visit', $seller->slug) }}"--}}
    {{--                                                       class="text-reset">{{ $seller->name }}</a>--}}
    {{--                                                </h2>--}}
    {{--                                                <div class="rating rating-sm mb-2">--}}
    {{--                                                    {{ renderStarRating($seller->rating) }}--}}
    {{--                                                </div>--}}
    {{--                                                <div class="rating rating-sm mb-2">--}}
    {{--                                                    {{ $seller->address }}--}}
    {{--                                                </div>--}}
    {{--                                                <div class="rating rating-sm mb-2">--}}
    {{--                                                    Distance: {{ number_format($seller->distance_in_km, 2) }}--}}
    {{--                                                </div>--}}
    {{--                                                <a href="{{ route('shop.visit', $seller->slug) }}"--}}
    {{--                                                   class="btn btn-soft-primary btn-sm mb-2">--}}
    {{--                                                    {{ translate('Visit Store') }} <i class="las la-angle-right"></i>--}}
    {{--                                                </a>--}}
    {{--                                                <a href="{{ route('shop.booking', $seller->slug) }}"--}}
    {{--                                                   class="btn btn-primary">--}}
    {{--                                                    Book Appointment--}}
    {{--                                                </a>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="mb-4">
        <div class="container mt-3">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    @foreach ($nearby_sellers as $key => $seller)
                        @if ($seller->user != null)
                            <div class="bg-white mb-3 shadow-sm rounded">
                                <div class="col-8 border-left border-light">
                                    <div class="col-3">
                                        <a href="{{ route('shop.visit', $seller->slug) }}" class="d-block p-3">
                                            <img
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="@if ($seller->logo !== null) {{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif"
                                                alt="{{ $seller->name }}"
                                                class="img-fluid lazyload">
                                        </a>
                                    </div>
                                    <div class="p-3 ml-3">
                                        <h2 class="h6 fw-600 text-truncate">
                                            <a href="{{ route('shop.visit', $seller->slug) }}"
                                               class="text-reset">{{ $seller->name }}</a>
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            {{ renderStarRating($seller->rating) }}
                                        </div>
                                        <div class="rating rating-sm mb-2">
                                            {{ $seller->address }}
                                        </div>
                                        <div class="rating rating-sm mb-2">
                                            Distance: {{ number_format($seller->distance_in_km, 2) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 clearfix">
                                        <a href="{{ route('shop.visit', $seller->slug) }}"
                                           class="btn btn-soft-primary btn-sm mb-2">
                                            {{ translate('Visit Store') }} <i class="las la-angle-right"></i>
                                        </a>
                                        <a href="{{ route('shop.booking', $seller->slug) }}"
                                           class="btn btn-soft-primary btn-sm mb-2">
                                            Book Appointment
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection
