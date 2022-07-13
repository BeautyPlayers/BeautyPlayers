@extends('frontend.layouts.app')

@section('header-styles')
    <!-- Fontawesome CSS -->
    <script src="https://kit.fontawesome.com/9b6c6cb0f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ static_asset('css/frontend/nearby_sellers.css') }}">    
@endsection

@section('content')
    <section class="mb-4">
        <div class="container mt-3">
            <div class="row gutters-10">
                <div class="col-xl-12 order-0 order-xl-1">
                    @foreach ($nearby_sellers as $key => $seller)
                        @if ($seller->user != null)


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
