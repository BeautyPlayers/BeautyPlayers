@extends('frontend.layouts.app')

@section('header-styles')
    <!-- Fontawesome CSS -->
    <script src="https://kit.fontawesome.com/9b6c6cb0f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ static_asset('css/frontend/nearby_sellers.css') }}">    
@endsection

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
                            {{-- <div class="bg-white mb-3 shadow-sm rounded">
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
                            </div> --}}


                            {{-- ======================= New Design ================================ --}}
                            <div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="{{ route('shop.visit', $seller->slug) }}">
													<img src="@if($seller->logo !== null){{ uploaded_asset($seller->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" data-src="" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="{{ route('shop.visit', $seller->slug) }}">{{ $seller->name }}</a></h4>
												<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
												<h5 class="doc-department"><img src="{{static_asset('assets/img/specialities-05.png')}}" class="img-fluid" alt="Speciality">Dentist</h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $seller->address }}</p>
													<ul class="clinic-gallery">
														<li>
															<a href="{{static_asset('assets/img/feature_1.jpg')}}" data-fancybox="gallery">
																<img src="{{static_asset('assets/img/feature_1.jpg')}}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{static_asset('assets/img/feature_1.jpg')}}" data-fancybox="gallery">
																<img src="{{static_asset('assets/img/feature_1.jpg')}}" alt="Feature">
															</a>
														</li>
                                                        <li>
															<a href="{{static_asset('assets/img/feature_1.jpg')}}" data-fancybox="gallery">
																<img src="{{static_asset('assets/img/feature_1.jpg')}}" alt="Feature">
															</a>
														</li>
                                                        <li>
															<a href="{{static_asset('assets/img/feature_1.jpg')}}" data-fancybox="gallery">
																<img src="{{static_asset('assets/img/feature_1.jpg')}}" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Dental Fillings</span>
													<span> Whitneing</span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li>
													<li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
													<li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="{{ route('shop.visit', $seller->slug) }}">Visit Store</a>
												<a class="apt-btn" href="{{ route('shop.booking', $seller->slug) }}">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
                            {{-- ============================== New Design end ========================== --}}
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

@section('footer-scripts')

@endsection
