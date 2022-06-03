@extends('frontend.layouts.app')

@section('meta_title'){{ "All services" }}@stop


@section('meta')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ static_asset('catlayout/style.css') }}">
    <link rel="stylesheet" href="{{ static_asset('catlayout/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ static_asset('catlayout/slick/slick-theme.css') }}">

    <style>
        .checked {
            color: orange;
            font-size: 16px;
        }
    </style>

@endsection

@section('content')

    <nav class="nav-sections  slider">
        <ul class="menu regular ">

            @if (count($categories) > 0)

                @foreach ($categories as $key => $category)
                    <li class="menu-item"><a class="menu-item-link active" href="#p{{ $category->id }}">{{ $category->getTranslation('name') }}</a></li>

                @endforeach
            @endif
            <div class="active-line"></div>
        </ul>
    </nav>


    <main id="main-content" class="page-sections" style="z-index: 0; position: relative;top: -25px;width:100%;">
        @foreach($producstList as $k=>$v)
            <section class="page-section ">
                <div class="container" style="background-color: #ffffff;">
                    <h2 class="section-title" style="display: none;" id="p{{ ($v->category->parent_id !== 0)? $v->category->parent_id: $v->category->id }}"></h2>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row border rounded">
                                <div class="p-0 col-md-3 col-sm-12" >
                                    <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ floor(($v->discount/$v->unit_price)*100) }}%</span></span>
                                    <img src="{{ uploaded_asset($v->thumbnail_img) }}" class="img-thumbnail border-0" style="height: 185px;width: 100%;object-fit: cover;"/>
                                    <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">Club Point: <span class="fw-700 float-right">0</span></div>
                                </div>
                                <div class="pl-3 pt-2 pr-2 pb-2 col-md-9 border-left col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <h4 class="text-primary" style="font-size: 16px;">{{ substr($v->name, 0, 20) }} &nbsp;&nbsp;<span style="font-size:12px;">{{ $v->brand->name ?? '' }}</span></h4>
                                            <h5 class="text-primary" style="font-size: 20px;">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked" ></span>
                                                <span class="fa fa-star checked"></span>
                                            </h5>
                                            <h5 class="text-primary" style="font-size: 11px;">
{{--                                                {!! $v->description !!}--}}
                                                {{ substr((strip_tags($v->description) ?? 'N/A'), 0, 80) }}
                                            </h5>
                                            <div class="fs-15">
                                                <del class="fw-600 opacity-50 mr-1">Rs{{ $v->unit_price }}</del>
                                                <span class="fw-700 text-primary">Rs{{ $v->unit_price - $v->discount }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="text-right m-0" >
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="opacity-50 my-2">{{ translate('Share') }}:</div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="aiz-share"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="text-right m-2">
                                                <a href="javascript:void(0)" style="position: relative;right: 22px;" onclick="addToWishList({{ $v->id }})" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left" tabindex="0" data-original-title="" title="">
                                                    <i class="la la-heart-o" style="font-size: 21px;"></i>
                                                </a>
                                                <a href="javascript:void(0)" style="position: relative;right: 12px;" onclick="addToCompare({{ $v->id }})" data-toggle="tooltip" data-title="Add to compare" data-placement="left" tabindex="0" data-original-title="" title="">
                                                    <i class="las la-sync"  style="font-size: 21px;"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background-color: #14a800;" onclick="showAddToCartModal({{ $v->id }})" data-toggle="tooltip"  data-placement="left" tabindex="0" data-original-title="" title="">
                                                    Add to cart
                                                </a>
                                            </p>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </main>
    <br/>
    <br/>
    <br/>
    <br/>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>


@endsection

@section('script')


    <script src='https://unpkg.com/smoothscroll-polyfill/dist/smoothscroll.min.js'></script>
    <script src='https://unpkg.com/smoothscroll-anchor-polyfill'></script>
    <!--<script  src="./script.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{ static_asset('catlayout/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ static_asset('catlayout/script.js') }}"></script>

    <script type="text/javascript">
        var jQuery_2_2 = $.noConflict(true);
        jQuery_2_2(document).on('ready', function() {
            jQuery_2_2(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 5
            });
            jQuery_2_2(".lazy").slick({
                lazyLoad: 'ondemand', // ondemand progressive anticipated
                infinite: true
            });
        });
    </script>

@endsection
