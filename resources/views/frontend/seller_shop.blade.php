@extends('frontend.layouts.app')

@section('meta_title'){{ $shop->meta_title }}@stop

@section('meta_description'){{ $shop->meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $shop->meta_title }}">
    <meta itemprop="description" content="{{ $shop->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($shop->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $shop->meta_title }}">
    <meta name="twitter:description" content="{{ $shop->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($shop->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $shop->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('shop.visit', $shop->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($shop->logo) }}" />
    <meta property="og:description" content="{{ $shop->meta_description }}" />
    <meta property="og:site_name" content="{{ $shop->name }}" />
@endsection

@section('content')
@push('style')
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/all.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/css/shop.css')}}">
    <style>
        .btn-padding {
            padding: 0.375rem 0.75rem;;
        }
    </style>
@endpush
<div class="content">
    <div class="container">

        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->logo !== null) {{ uploaded_asset($shop->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload img-fluid">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">
                                {{ $shop->name }}
                                @if ($shop->verification_status == 1)
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                @else
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                @endif
                            </h4>
                            <p class="doc-speciality">{{ $shop->address }}</p>
{{--                            <p class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p>--}}
                            <div class="rating">
                                {{ renderStarRating($shop->rating) }}
                                <span class="d-inline-block average-rating">({{$shop->num_of_reviews}})</span>
                            </div>
                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <a href="javascript:void(0);">Get Directions</a></p>
                                <ul class="clinic-gallery">
                                    <li>
                                        <a href="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" data-fancybox="gallery">
                                            <img src="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="Feature">
                                        </a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">--}}
{{--                                            <img  src="assets/img/features/feature-02.jpg" alt="Feature Image">--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">--}}
{{--                                            <img src="assets/img/features/feature-03.jpg" alt="Feature">--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">--}}
{{--                                            <img src="assets/img/features/feature-04.jpg" alt="Feature">--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
{{--                            <div class="clinic-services">--}}
{{--                                <span>Dental Fillings</span>--}}
{{--                                <span>Teeth Whitneing</span>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="far fa-thumbs-up"></i> 99%</li>
                                <li><i class="far fa-comment"></i> {{$shop->num_of_reviews}} Feedback</li>
                                <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                <li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
                            </ul>
                        </div>
                        <div class="doctor-action">
                            <a href="javascript:void(0)" class="btn btn-padding btn-white fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-padding btn-white msg-btn">
                                <i class="far fa-comment-alt"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-padding btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                <i class="fas fa-phone"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-padding btn-white call-btn" data-toggle="modal" data-target="#video_call">
                                <i class="fas fa-video"></i>
                            </a>
                        </div>
                        <div class="clinic-booking">
                            <a class="apt-btn" href="{{ route('shop.booking', $shop->slug) }}">Book Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Doctor Widget -->

        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content pt-0">

                    <!-- Overview Content -->
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-12 col-lg-9">

                                <!-- About Details -->
                                <div class="widget about-widget">
                                    <h4 class="widget-title">About Me</h4>
                                    <p>{{$shop->about_me}}</p>
                                </div>
                                <!-- /About Details -->

                                <!-- Education Details -->
                                <div class="widget education-widget">
                                    <h4 class="widget-title">Education</h4>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @forelse($education as $edu)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">{{$edu->college}}</a>
                                                            <div>{{$edu->degree}}</div>
                                                            <span class="time">{{$edu->year}}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">N/A</a>
                                                            <div>N/A</div>
                                                            <span class="time">N/A</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Education Details -->

                                <!-- Experience Details -->
                                <div class="widget experience-widget">
                                    <h4 class="widget-title">Work & Experience</h4>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @forelse($exps as $exp)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">{{$exp->name}}</a>
                                                            <span class="time">{{$exp->from}} - {{$exp->to}}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">N/A</a>
                                                            <span class="time">N/A</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Experience Details -->

                                <!-- Awards Details -->
                                <div class="widget awards-widget">
                                    <h4 class="widget-title">Awards</h4>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @forelse($awards as  $award)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">{{$award->year}}</p>
                                                            <h4 class="exp-title">{{$award->award}}</h4>
                                                            <p>{{null}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">N/A</p>
                                                            <h4 class="exp-title">N/A</h4>
                                                            <p>N/A</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Awards Details -->

                                @php
                                    $services_id = json_decode($shop->service_id);
                                @endphp
                                <!-- Services List -->
                                <div class="service-list">
                                    <h4>Services</h4>
                                    <ul class="clearfix">
                                        @forelse($services_id as $sid)
                                            @php
                                                $service = \App\Models\Product::select('name')->where('id', $sid)->first();
                                            @endphp
                                            <li>{{$service->name}}</li>
                                        @empty
                                            <li>N/A</li>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /Services List -->

                                @php
                                    $spls = explode (",", $shop->specialization);
                                @endphp
                                <!-- Specializations List -->
                                <div class="service-list">
                                    <h4>Specializations</h4>
                                    <ul class="clearfix">
                                        @forelse($spls as $sp)
                                            <li>{{$sp}}</li>
                                        @empty
                                            <li>N/A</li>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /Specializations List -->

                            </div>
                        </div>
                    </div>
                    <!-- /Overview Content -->

                    <!-- Locations Content -->
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                        <!-- Location List -->
                        <div class="location-list">
                            <div class="row">

                                <!-- Clinic Content -->
                                <div class="col-md-6">
                                    <div class="clinic-content">
                                        <h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
                                        <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(4)</span>
                                        </div>
                                        <div class="clinic-details mb-0">
                                            <h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2286  Sundown Lane, Austin, Texas 78749, USA <br><a href="javascript:void(0);">Get Directions</a></h5>
                                            <ul>
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-01.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-03.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-04.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Clinic Content -->

                                <!-- Clinic Timing -->
                                <div class="col-md-4">
                                    <div class="clinic-timing">
                                        <div>
                                            <p class="timings-days">
                                                <span> Mon - Sat </span>
                                            </p>
                                            <p class="timings-times">
                                                <span>10:00 AM - 2:00 PM</span>
                                                <span>4:00 PM - 9:00 PM</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="timings-days">
                                                <span>Sun</span>
                                            </p>
                                            <p class="timings-times">
                                                <span>10:00 AM - 2:00 PM</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Clinic Timing -->

                                <div class="col-md-2">
                                    <div class="consult-price">
                                        $250
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Location List -->

                        <!-- Location List -->
                        <div class="location-list">
                            <div class="row">

                                <!-- Clinic Content -->
                                <div class="col-md-6">
                                    <div class="clinic-content">
                                        <h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                                        <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(4)</span>
                                        </div>
                                        <div class="clinic-details mb-0">
                                            <p class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2883  University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
                                            <ul>
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-01.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-03.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                        <img src="assets/img/features/feature-04.jpg" alt="Feature Image">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- /Clinic Content -->

                                <!-- Clinic Timing -->
                                <div class="col-md-4">
                                    <div class="clinic-timing">
                                        <div>
                                            <p class="timings-days">
                                                <span> Tue - Fri </span>
                                            </p>
                                            <p class="timings-times">
                                                <span>11:00 AM - 1:00 PM</span>
                                                <span>6:00 PM - 11:00 PM</span>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="timings-days">
                                                <span>Sat - Sun</span>
                                            </p>
                                            <p class="timings-times">
                                                <span>8:00 AM - 10:00 AM</span>
                                                <span>3:00 PM - 7:00 PM</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Clinic Timing -->

                                <div class="col-md-2">
                                    <div class="consult-price">
                                        $350
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Location List -->

                    </div>
                    <!-- /Locations Content -->

                    <!-- Reviews Content -->
                    <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                        <!-- Review Listing -->
                        <div class="widget review-listing">
                            <ul class="comments-list">

                                <!-- Comment List -->
                                <li>
                                    <div class="comment">
                                        <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient.jpg">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="comment-author">Richard Wilson</span>
                                                <span class="comment-date">Reviewed 2 Days ago</span>
                                                <div class="review-count rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
                                            <p class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation.
                                                Curabitur non nulla sit amet nisl tempus
                                            </p>
                                            <div class="comment-reply">
                                                <a class="comment-btn" href="#">
                                                    <i class="fas fa-reply"></i> Reply
                                                </a>
                                                <p class="recommend-btn">
                                                    <span>Recommend?</span>
                                                    <a href="#" class="like-btn">
                                                        <i class="far fa-thumbs-up"></i> Yes
                                                    </a>
                                                    <a href="#" class="dislike-btn">
                                                        <i class="far fa-thumbs-down"></i> No
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Comment Reply -->
                                    <ul class="comments-reply">
                                        <li>
                                            <div class="comment">
                                                <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient1.jpg">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author">Charlene Reed</span>
                                                        <span class="comment-date">Reviewed 3 Days ago</span>
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="comment-content">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                        Ut enim ad minim veniam.
                                                        Curabitur non nulla sit amet nisl tempus
                                                    </p>
                                                    <div class="comment-reply">
                                                        <a class="comment-btn" href="#">
                                                            <i class="fas fa-reply"></i> Reply
                                                        </a>
                                                        <p class="recommend-btn">
                                                            <span>Recommend?</span>
                                                            <a href="#" class="like-btn">
                                                                <i class="far fa-thumbs-up"></i> Yes
                                                            </a>
                                                            <a href="#" class="dislike-btn">
                                                                <i class="far fa-thumbs-down"></i> No
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- /Comment Reply -->

                                </li>
                                <!-- /Comment List -->

                                <!-- Comment List -->
                                <li>
                                    <div class="comment">
                                        <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient2.jpg">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="comment-author">Travis Trimble</span>
                                                <span class="comment-date">Reviewed 4 Days ago</span>
                                                <div class="review-count rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation.
                                                Curabitur non nulla sit amet nisl tempus
                                            </p>
                                            <div class="comment-reply">
                                                <a class="comment-btn" href="#">
                                                    <i class="fas fa-reply"></i> Reply
                                                </a>
                                                <p class="recommend-btn">
                                                    <span>Recommend?</span>
                                                    <a href="#" class="like-btn">
                                                        <i class="far fa-thumbs-up"></i> Yes
                                                    </a>
                                                    <a href="#" class="dislike-btn">
                                                        <i class="far fa-thumbs-down"></i> No
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- /Comment List -->

                            </ul>

                            <!-- Show All -->
                            <div class="all-feedback text-center">
                                <a href="#" class="btn btn-primary btn-sm">
                                    Show all feedback <strong>(167)</strong>
                                </a>
                            </div>
                            <!-- /Show All -->

                        </div>
                        <!-- /Review Listing -->

                        <!-- Write Review -->
                        <div class="write-review">
                            <h4>Write a review for <strong>Dr. Darren Elder</strong></h4>

                            <!-- Write Review Form -->
                            <form>
                                <div class="form-group">
                                    <label>Review</label>
                                    <div class="star-rating">
                                        <input id="star-5" type="radio" name="rating" value="star-5">
                                        <label for="star-5" title="5 stars">
                                            <i class="active fa fa-star"></i>
                                        </label>
                                        <input id="star-4" type="radio" name="rating" value="star-4">
                                        <label for="star-4" title="4 stars">
                                            <i class="active fa fa-star"></i>
                                        </label>
                                        <input id="star-3" type="radio" name="rating" value="star-3">
                                        <label for="star-3" title="3 stars">
                                            <i class="active fa fa-star"></i>
                                        </label>
                                        <input id="star-2" type="radio" name="rating" value="star-2">
                                        <label for="star-2" title="2 stars">
                                            <i class="active fa fa-star"></i>
                                        </label>
                                        <input id="star-1" type="radio" name="rating" value="star-1">
                                        <label for="star-1" title="1 star">
                                            <i class="active fa fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Title of your review</label>
                                    <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
                                </div>
                                <div class="form-group">
                                    <label>Your review</label>
                                    <textarea id="review_desc" maxlength="100" class="form-control"></textarea>

                                    <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept">
                                            <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                </div>
                            </form>
                            <!-- /Write Review Form -->

                        </div>
                        <!-- /Write Review -->

                    </div>
                    <!-- /Reviews Content -->

                    <!-- Business Hours Content -->
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">

                                <!-- Business Hours Widget -->
                                <div class="widget business-widget">
                                    <div class="widget-content">
                                        <div class="listing-hours">
                                            <div class="listing-day current">
                                                <div class="day">Today <span>5 Nov 2019</span></div>
                                                <div class="time-items">
                                                    <span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Monday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Tuesday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Wednesday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Thursday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Friday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day">
                                                <div class="day">Saturday</div>
                                                <div class="time-items">
                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="listing-day closed">
                                                <div class="day">Sunday</div>
                                                <div class="time-items">
                                                    <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Business Hours Widget -->

                            </div>
                        </div>
                    </div>
                    <!-- /Business Hours Content -->

                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->

    </div>
</div>
@endsection
