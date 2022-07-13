@extends('seller.layouts.app')

@section('panel_content')
    @push('style')
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/all.min.css')}}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/select2/css/select2.min.css')}}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">

        <link rel="stylesheet" href="{{asset('new/assets/plugins/dropzone/dropzone.min.css')}}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/css/doctor-profile.css')}}">
        <style>
            .badge {
                height: auto;
                width: auto;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #009efb;
                color: #fff;
                display: inline-block;
                font-size: 14px;
                font-weight: normal;
                border-radius: 0;
                cursor: default;
                float: left;
                margin-right: 5px;
                margin-top: 5px;
                padding: 11px 15px;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                color: #fff;
            }

            .select2-container--default .select2-search--inline .select2-search__field {
                margin-top: 14px;
            }
            /*.bootstrap-tagsinput .tag {*/
            /*    background-color: #20c0f3;*/
            /*    color: #fff;*/
            /*    display: inline-block;*/
            /*    font-size: 14px;*/
            /*    font-weight: normal;*/
            /*    margin-right: 2px;*/
            /*    padding: 11px 15px;*/
            /*    border-radius: 0;*/
            /*}*/
        </style>
    @endpush
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Shop Settings')}}
                    <a href="{{ route('shop.visit', $shop->slug) }}" class="btn btn-link btn-sm" target="_blank">({{ translate('Visit Shop')}})<i class="la la-external-link"></i>)</a>
                </h1>
            </div>
        </div>
    </div>






    <form action="{{route('seller.shop.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <input type="hidden" name="user_id" value="{{ $shop->user_id }}">
        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->logo !== null) {{ uploaded_asset($shop->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload" name="logo">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic Information -->

        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Me</h4>
                <div class="form-group mb-0">
                    <label>Biography</label>
                    <textarea class="form-control" rows="5" name="about_me">{{$shop->about_me}}</textarea>
                </div>
            </div>
        </div>
        <!-- /About Me -->

        <!-- Clinic Info -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Info</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $shop->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shop Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $shop->address }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Banner</span>
                                        <input type="file" class="upload" name="banner">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Shop Banner</label>--}}
{{--                            <form action="#" class="dropzone"></form>--}}
{{--                        </div>--}}
{{--                        <div class="upload-wrap">--}}
{{--                            <div class="upload-images">--}}
{{--                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">--}}
{{--                                <a href="javascript:void(0);" class="btn btn-icon-dp btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /Clinic Info -->

        <!-- Contact Details -->
        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Contact Details</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="delivery_pickup_longitude" value="{{ $shop->delivery_pickup_longitude }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Latitude</label>
                            <input type="text" class="form-control" name="delivery_pickup_latitude" value="{{ $shop->delivery_pickup_latitude }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Contact Details -->

        <!-- Pricing -->
        <div class="card">
            <div class="card-body">
                <!--<h4 class="card-title">Seller Level</h4>-->

                <div class="form-group row" id="seller_level">
                    <label class="col-md-2 col-form-label">{{ translate('Seller Level') }}</label>
                    <div class="col-md-10">
                        <select class="form-control aiz-selectpicker111" name="seller_level_id" id="seller_level_id">
                            @if(isset($seller_levels) && count($seller_levels))
                            @foreach ($seller_levels as $seller_level)
                                <option value="{{ $seller_level->id }}" <?= $shop->seller_level_id == $seller_level->id ? 'selected' : '' ?>>₹{{ $seller_level->commission }}/min</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="seller_tag">
                    <label class="col-md-2 col-form-label">{{ translate('Seller Tag') }}</label>
                    <div class="col-md-10">
                        <select class="form-control aiz-selectpicker111" name="seller_tag_id" id="seller_tag_id">
                            @if(isset($seller_tags) && count($seller_tags))
                            @foreach ($seller_tags as $seller_tag)
                                <option value="{{ $seller_tag->id }}" <?= $shop->seller_tag_id == $seller_tag->id ? 'selected' : '' ?>>{{ $seller_tag->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Title') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Meta Title')}}" name="meta_title" value="{{ $shop->meta_title }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Description') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="meta_description" rows="3" class="form-control mb-3" required>{{ $shop->meta_description }}</textarea>
                    </div>
                </div>
                <?php 
                /*<div class="form-group mb-0">
                    <div id="pricing_select">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="1" checked>
                            <label class="custom-control-label" for="price_free">Beauty Exper</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_custom" name="rating_option" value="2" class="custom-control-input">
                            <label class="custom-control-label" for="price_custom">Senior Beauty Expert</label>
                        </div>
                    </div>

                </div>*/
                ?>

            </div>
        </div>
        <!-- /Pricing -->

        <!-- Services and Specialization -->
        <div class="card services-card">
            <div class="card-body">
                <h4 class="card-title">Services and Specialization</h4>
                <div class="form-group">
                    <label>Services</label>
                    @php
                        $sps = json_decode($shop->service_id);
                    @endphp
                    <select name="service_id[]" class="input-tags form-control" id="select2-dropdown"  multiple="multiple">
                        @foreach($products as $product)
                            @foreach($sps as $ssd)
                                <option value="{{$product->id}}" {{$product->id == $ssd ? 'selected' : ''}}>{{$product->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
    {{--                <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="Tooth cleaning " id="services">--}}
                    <small class="form-text text-muted">Note : Type & Press enter to add new services</small>
                </div>
                <div class="form-group mb-0">
                    <label>Specialization </label>
    {{--                <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="Children Care,Dental Care" id="specialist">--}}
                    <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="{{$shop->specialization}}" id="specialist">
                    <small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
                </div>
            </div>
        </div>
        <!-- /Services and Specialization -->

        <!-- Education -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Education</h4>
                <div class="education-info">
                    @forelse($edus as $edu)
                        <div id="i" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row education-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Degree</label>
                                                <input type="text" class="form-control" name="education[0][degree]" value="{{$edu->degree}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>College/Institute</label>
                                                <input type="text" class="form-control" name="education[0][college]" value="{{$edu->college}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="text" class="form-control" name="education[0][year]" value="{{$edu->year}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($edu->photo !== null) {{ uploaded_asset($edu->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="education[0][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$edu->photo}}" name="education[0][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row education-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Degree</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][degree]" value="{{$edu->degree}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>College/Institute</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][college]" value="{{$edu->college}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][year]" value="{{$edu->year}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($edu->photo !== null) {{ uploaded_asset($edu->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="education[{{$loop->index}}][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$edu->photo}}" name="education[{{$loop->index}}][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="i" data-id="0"></div>
                        <div class="row form-row education-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input type="text" class="form-control" name="education[0][degree]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>College/Institute</label>
                                            <input type="text" class="form-control" name="education[0][college]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Year of Completion</label>
                                            <input type="text" class="form-control" name="education[0][year]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="education[0][photo]">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{null}}" name="education[0][prev_photo]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Education -->

        <!-- Experience -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Experience</h4>
                <div class="experience-info">
                    @forelse($exps as $exp)
                        <div id="ei" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row experience-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="experience[0][name]" value="{{$exp->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" class="form-control" name="experience[0][from]" value="{{$exp->from}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="text" class="form-control" name="experience[0][to]" value="{{$exp->to}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="experience[0][designation]" value="{{$exp->designation}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($exp->photo !== null) {{ uploaded_asset($exp->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="experience[0][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$exp->photo}}" name="experience[0][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row experience-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][name]" value="{{$exp->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][from]" value="{{$exp->from}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][to]" value="{{$exp->to}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][designation]" value="{{$exp->designation}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($exp->photo !== null) {{ uploaded_asset($exp->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="experience[{{$loop->index}}][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$exp->photo}}" name="experience[{{$loop->index}}][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="ei" data-id="0"></div>
                        <div class="row form-row experience-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" class="form-control" name="experience[0][name]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" class="form-control" name="experience[0][from]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="text" class="form-control" name="experience[0][to]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="experience[0][designation]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="experience[0][photo]">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{null}}" name="experience[0][prev_photo]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Experience -->

        <!-- Awards -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Awards</h4>
                <div class="awards-info">
                    @forelse($awards as $awd)
                        <div id="a" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row awards-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Awards</label>
                                        <input type="text" class="form-control" name="awards[0][award]" value="{{$awd->award}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="awards[0][year]" value="{{$awd->year}}" required>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row awards-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Awards</label>
                                        <input type="text" class="form-control" name="awards[{{$loop->index}}][award]" value="{{$awd->award}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="awards[{{$loop->index}}][year]" value="{{$awd->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="a" data-id="0"></div>
                        <div class="row form-row awards-cont">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Awards</label>
                                    <input type="text" class="form-control" name="awards[0][award]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="awards[0][year]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Awards -->

        <!-- Memberships -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Memberships</h4>
                <div class="membership-info">
                    @forelse($memberships as $member)
                        <div id="m" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row membership-cont">
                                <div class="col-12 col-md-10 col-lg-5">
                                    <div class="form-group">
                                        <label>Memberships</label>
                                        <input type="text" class="form-control" name="memberships[0][membership]" value="{{$member->membership}}" required>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row membership-cont">
                                <div class="col-12 col-md-10 col-lg-5">
                                    <div class="form-group">
                                        <label>Memberships</label>
                                        <input type="text" class="form-control" name="memberships[{{$loop->index}}][membership]" value="{{$member->membership}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="m" data-id="0"></div>
                        <div class="row form-row membership-cont">
                            <div class="col-12 col-md-10 col-lg-5">
                                <div class="form-group">
                                    <label>Memberships</label>
                                    <input type="text" class="form-control" name="memberships[0][membership]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Memberships -->

        <!-- Registrations -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registrations</h4>
                <div class="registrations-info">
                    @forelse($regs as $reg)
                        <div id="r" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row reg-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Registrations</label>
                                        <input type="text" class="form-control" name="regs[0][registration]" value="{{$reg->registration}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="regs[0][year]" value="{{$reg->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($reg->photo !== null) {{ uploaded_asset($reg->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="regs[0][photo]">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$reg->photo}}" name="regs[0][prev_photo]">
                                </div>
                            </div>
                        @else
                            <div class="row form-row reg-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Registrations</label>
                                        <input type="text" class="form-control" name="regs[{{$loop->index}}][registration]" value="{{$reg->registration}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="regs[{{$loop->index}}][year]" value="{{$reg->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($reg->photo !== null) {{ uploaded_asset($reg->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="regs[{{$loop->index}}][photo]">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$reg->photo}}" name="regs[{{$loop->index}}][prev_photo]">
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="r" data-id="0"></div>
                        <div class="row form-row reg-cont">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Registrations</label>
                                    <input type="text" class="form-control" name="regs[0][registration]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="regs[0][year]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                        </div>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" class="upload" name="regs[0][photo]">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{null}}" name="regs[0][prev_photo]">
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Registrations -->

        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Social Media</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{ $shop->facebook }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{ $shop->instagram }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Google</label>
                            <input type="text" class="form-control" name="google" value="{{ $shop->google }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $shop->twitter }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{ $shop->youtube }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>
    </form>






















@endsection

@section('script')
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
    <!-- Select2 JS -->
    <script src="{{asset('new/assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Dropzone JS -->
    <script src="{{asset('new/assets/plugins/dropzone/dropzone.min.js')}}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{asset('new/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

    <!-- Profile Settings JS -->
    <script src="{{asset('new/assets/js/profile-settings.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('new/assets/js/script.js')}}"></script>
    <script>
        $('#select2-dropdown').select2({
            placeholder: "Enter Services",
            allowClear: true
        });
        function initMap()
        {
            var options ={
                zoom:8,
                center:{lat:28.6862738,lng:77.2217831}
            }
            var map =  new google.maps.Map(document.getElementById('map'),options);

            var marker = new google.maps.Marker({
                position: {
                    lat:28.6862738,
                    lng:77.2217831
                },
                map: map,
                draggable: false

            });
            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));
            google.maps.event.addListener(searchBox,'places_changed',function(){
                var places = searchBox.getPlaces();
                var bounds =  new google.maps.LatLngBounds();
                var i,place;
                for(i=0; place=places[i];i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);

            });
            google.maps.event.addListener(marker,'position_changed',function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);

            });
        }

    </script>
    <script  async defer
             src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpgVwmJo0oG5ZfGKnkdiDCy75ELgptvC8&libraries=places&callback=initMap">
    </script>


    @if (get_setting('google_map') == 1)

        @include('frontend.partials.google_map')

    @endif

@endsection
