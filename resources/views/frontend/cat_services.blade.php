@extends('frontend.layouts.app')

@section('meta_title'){{ "All services" }}@stop


@section('meta')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ static_asset('catlayout/style.css') }}">
<!--<link rel="stylesheet" href="{{ static_asset('catlayout/slick/slick.css') }}">-->
<!--<link rel="stylesheet" href="{{ static_asset('catlayout/slick/slick-theme.css') }}">-->

<!-- Owl Stylesheets -->
<link rel="stylesheet" href="{{ static_asset('assets/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ static_asset('assets/owlcarousel/assets/owl.theme.default.min.css') }}">

<style>
    .checked {
        color: orange;
        font-size: 16px;
    }
    .col-xs-4{
        width: 40% !important;
    }
    .col-xs-8{
        width: 60% !important;
    }

    .nav-cat{
        min-height: 110px;
        /*height: auto;*/
    }

    .slick-slide{
        opacity: 1 !important;
    }

    .opencat-active{
        font-weight: 600;
        /* text-transform: uppercase; */
        color: rgb(37, 211, 102) !important;
    }

    .opensubcat-active{
        font-weight: 600;
        /* text-transform: uppercase; */
        color: rgb(181 36 95) !important;
    }
    .cat-title h6 { color: #b62661; font-size: 1.2rem !important; margin-bottom: 8px; font-weight: 700 !important; }
    .cat-sub { color: #000 !important; font-size: 0.89rem; font-weight: 600;margin-bottom: 2px; }
    .catbtnList a.cat-button:hover { background: #af084b !important; border-color: #af084b; }
    .catbtnList a.cat-button { color: #fff; background: #b62661 !important; border-color: #b62661; }
    .catbtnList a {color: #000;}
    .cat-club { background: #f3f0f0; padding: 4px; margin-left: 4px; margin-right: 4px; font-size: 13px;margin-bottom: 2px; }
    .top-catTitle { color: #b83061 !important; font-size: 28px !important; }
    .cat-sub span { font-size: 12px; color: #8f8f8f; }

    ul li{
        list-style: none;
    }
</style>
<style>
    /*    .owl-nav{
            position: absolute;
            top: 90px;
            margin: 0;
        }
    
        .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot{
            position: absolute;
            left: 0;
            margin-top: -60px;
        }
        .owl-carousel .owl-nav button.owl-next span, .owl-carousel .owl-nav button.owl-prev span, .owl-carousel button.owl-dot span{
            font-size: 30px;
        }*/



    .owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot.owl-nav {
        position: absolute;
        left: 20px;
        top: 40%;
        background-color: var(--base-color) !important;
        display: block;
        padding: 0 .3em !important;
        font-size: 3em;
        margin: 0;
        cursor: pointer;
        color: #000 !important;
        transform: translate(-50%, -50%);
    }

    .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-next, .owl-carousel button.owl-dot.owl-nav {
        position: absolute;
        right: -23px;
        top: 40%;
        background-color: var(--base-color) !important;
        display: block ;
        padding: 0 .3em !important;
        font-size: 3em ;
        margin: 0;
        cursor: pointer;
        color: #000 !important;
        transform: translate(-50%, -50%);
    }


    .owl-carousel .item img{
        width: 80px;
        margin: 0 auto;
        text-align: center;
    }


    .owl-theme .owl-nav [class*=owl-]:hover{
        background-color: #fff;
    }
    .menu-open-subcat .owl-carousel .owl-stage{
        display: inline-block;
    }

    .no-js .owl-carousel, .owl-carousel.owl-loaded{
        padding: 0;
    }
</style>
@endsection

@section('content')

<nav class="nav-sections  slider nav-cat" style="top: 0px;">
    <ul class="menu regular text-center mb-0 owl-carousel owl-theme" style="max-width: initial;">
        @if (count($categories) > 0)
        <?php
        $childrenCategories = [];
        $categoryIds = [];
        ?>
        @if(count($todays_deal_products))

        <li class="menu-item item">
            <a class="menu-item-link open-subcat" id="0" href="#todeal">
                <img style="width: 40px;/* float: left; */display: unset;"
                     src="{{ static_asset('assets/img/today_deal.png') }}">
                <div style="/*float: left;*/">{{ translate('Todays Deal') }}</div>
            </a>
        </li>
        @endif

        <?php
        $featured_products = Cache::remember('featured_products', 3600, function () {
                    return filter_products(\App\Models\Product::with('brand', 'user', 'category')->where('published', 1)->where('featured', '1'))->limit(12)->get();
                });
        if (count($featured_products)) {
            ?>
            <li class="menu-item item">
                <a class="menu-item-link open-subcat" id="0" href="#featuredPr">
                    <img style="width: 40px;/* float: left; */display: unset;"
                         src="{{ static_asset('assets/img/featured.png') }}">
                    <div style="/*float: left;*/">{{ translate('Featured Products') }}</div>
                </a>
            </li>
            <?php
        }
        ?>

        @if(addon_is_activated('auction'))

        <?php
        $auction_products = \App\Models\Product::with('brand', 'user', 'category')->latest()->where('published', 1)->where('auction_product', 1);
        if (get_setting('seller_auction_product') == 0) {
            $auction_products = $auction_products->where('added_by', 'admin');
        }
        $auction_products = $auction_products->where('auction_start_date', '<=', strtotime("now"))->where('auction_end_date', '>=', strtotime("now"))->limit(12)->get();
        if (count($auction_products)) {
            ?>
            <li class="menu-item item">
                <a class="menu-item-link open-subcat" id="0" href="#aucp">
                    <img style="width: 40px;/* float: left; */display: unset;"
                         src="{{ static_asset('assets/img/auctions.png') }}">
                    <div style="/*float: left;*/">{{ translate('Auction Products') }}</div>
                </a>
            </li>
            <?php
        }
        ?>

        @endif
        @foreach ($categories as $key => $category)
        <li class="menu-item item">

            @if(count($category->childrenCategories))
            <?php
            $childrenCategories[] = $category->childrenCategories;
            $categoryIds[] = $category->id;
            ?>
            <a class="menu-item-link open-subcat text-center" id="{{ $category->id }}" href="#p{{ $category->parent_id !== 0 ? $category->parent_id : $category->id }}">
                <img style="width: 40px;/* float: left; */display: unset;"
                     src="{{ uploaded_asset($category->icon) }}">
                <div style="/*float: left;*/">{{ $category->getTranslation('name') }}</div>
            </a>
            @else
            <a class="menu-item-link open-subcat" id="0" href="#p{{ $category->parent_id !== 0 ? $category->parent_id : $category->id }}">
                <img style="width: 40px;/* float: left; */display: unset;"
                     src="{{ uploaded_asset($category->icon) }}">
                <div style="/*float: left;*/">{{ $category->getTranslation('name') }}</div>
            </a>
            @endif
        </li>
        @endforeach
        @endif
        <div class="active-line"></div>
    </ul>
    @if(count($childrenCategories))
    @foreach($childrenCategories as $key => $childrenCat)
    <div class="menu-open-subcat categoryId<?= $categoryIds[$key] ?>" style="display: none">
        <nav class="nav-sections slider" style="width: 95%;background: #e2e3e7;margin-top: -14px;height: 50px;">
            <ul class="menu regular text-center mb-0 owl-carousel owl-theme mb-0 " style="max-width: initial;">
                @foreach($childrenCat as $childcat)
                <li class="menu-item item">
                    <a class="menu-item-link click-subcat" style="padding: 15px;" href="#sub{{ $childcat->id }}">
                        {{ $childcat->getTranslation('name') }}
                    </a>
                </li> 
                @endforeach
            </ul>
        </nav>
    </div>

    @endforeach
    @endif
</nav>

<main id="main-content" class="page-sections pt-4" style="z-index: 0; position: relative;top: -25px;width:100%;">
    @if(isset($todays_deal_products) && count($todays_deal_products))
    <h2 class="mt-3 pt-3 pl-0 top-catTitle container" id="todeal" style="/* background: rgb(37, 211, 102); *//* padding: 15px; */font-size: 30px;font-weight: 700;text-transform: uppercase;color: rgb(37, 211, 102);">
        <img class="cat-image lazyload mr-2"
             src="{{ static_asset('assets/img/today_deal.png') }}"
             width="60">
        <span>{{ translate('Todays Deal') }}</span>
    </h2>
    @foreach($todays_deal_products as $k=>$v)
    @if ($v != null)
    <section class="page-section my-3 pr{{ $v->id }}" id="todeal{{ $v->id }}">
        <div class="container" style="background-color: #ffffff;">
            <!--<h2 class="section-title"></h2>-->
            <div class="row" id="Xp{{ $v->category ? (($v->category->parent_id !== 0)? $v->category->parent_id: $v->category->id) : 0 }}">
                <div class="col-md-12">
                    <div class="row shadow rounded">
                        <div class="p-0 col-md-3 col-xs-4" >
                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $v->unit_price > 0 ? floor(($v->discount/$v->unit_price)*100) : '0.0' }}%</span></span>
                            <img src="{{ uploaded_asset($v->thumbnail_img) }}" class="img-thumbnail border-0" style="height: 185px;width: 100%;object-fit: cover;"/>
                            @if (addon_is_activated('club_point') && $v->earn_point > 0)
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">{{ $v->earn_point }}</span></div>
                            @else
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">0</span></div>
                            @endif
                        </div>
                        <div class="pl-3 pt-3 pr-2 pb-2 col-md-9 border-left col-xs-8">
                            <div class="row">
                                <div class="col-md-7 col-sm-12 cat-title">
                                    @if($v->category)
                                    <h6 style="font-size: 15px;font-weight: 600;">{{ substr($v->category->name, 0, 20) }}</h6>
                                    @endif
                                    <h4 class="text-primary cat-sub">{{ substr($v->name, 0, 20) }} &nbsp;&nbsp;<span style="font-size:12px;">{{ $v->brand->name ?? '' }}</span></h4>
                                    <h5 class="text-primary rating-list">
                                        @php
                                        $total = 0;
                                        $total += $v->reviews->count();
                                        @endphp
                                        <span class="rating" style="font-size: 15px;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($total >= $i) {
                                                    ?>
                                                    <span class="fa fa-star"></span>
                                                <?php } else { ?>
                                                    <span class="fa fa-star-o"></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php /* {{ renderStarRating($v->rating) }} */ ?>
                                        </span>
                                        <span style="font-size: 12px;">({{ $total }} {{ translate('reviews')}})</span>
                                    </h5>

                                    <div class="fs-15">
                                        <del class="fw-600 opacity-50 mr-1">Rs{{ $v->unit_price }}</del>
                                        <span class="fw-700 text-primary cat-price">Rs{{ $v->unit_price - $v->discount }} 
                                            @if(!empty($v->unit) && $v->unit > 0)
                                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $v->getTranslation('unit') }} mins</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="text-right m-0" >
                                        <!--                                                    <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="opacity-50 my-2">{{ translate('Share') }}:</div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="aiz-share"></div>
                                                                                                </div>
                                                                                            </div>-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if(isset($v->referral_code_url))
                                                <div>
                                                    <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="{{ translate('Copied')}}" onclick="CopyToClipboard(this)" data-url="{{$v->referral_code_url}}">{{ isset($v->referral_commission) ? $v->referral_commission : translate('Copy the Promote Link')}}</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <?php
                                    /* <h5 class="text-primary" style="font-size: 14px;color: #000 !important;">
                                      {!! substr((strip_tags($v->description) ?? 'N/A'), 0, 80) !!}
                                      </h5> */
                                    ?>
                                    <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background-color: #14a800;" onclick="showAddToCartModal(<?= $v->id ?>)" data-toggle="tooltip"  data-placement="left" tabindex="0" data-original-title="" title="">
                                        View Details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right m-2 catbtnList">
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToWishList(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="la la-heart-o" style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToCompare(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to compare" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-sync"  style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="directAddToCart(<?= $v->id ?>)" class="addcart-btn<?= $v->id ?>" data-toggle="tooltip" data-title="Add to cart" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-shopping-cart"  style="font-size: 25px;"></i>
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
    @endif
    @endforeach
    @endif
    <!-- =============================-->
    @if(isset($featured_products) && count($featured_products))
    <h2 class="mt-3 pt-3 pl-0 top-catTitle container" id="featuredPr" style="/* background: rgb(37, 211, 102); *//* padding: 15px; */font-size: 30px;font-weight: 700;text-transform: uppercase;color: rgb(37, 211, 102);">
        <img class="cat-image lazyload mr-2"
             src="{{ static_asset('assets/img/featured.png') }}"
             width="60">
        <span>{{ translate('Featured Products') }}</span>
    </h2>
    @foreach($featured_products as $k=>$v)
    <section class="page-section my-3 pr{{ $v->id }}" id="featuredPr{{ $v->id }}">
        <div class="container" style="background-color: #ffffff;">
            <!--<h2 class="section-title"></h2>-->
            <div class="row" id="Xp{{ $v->category ? (($v->category->parent_id !== 0)? $v->category->parent_id: $v->category->id) : 0 }}">
                <div class="col-md-12">
                    <div class="row shadow rounded">
                        <div class="p-0 col-md-3 col-xs-4" >
                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $v->unit_price > 0 ? floor(($v->discount/$v->unit_price)*100) : '0.0' }}%</span></span>
                            <img src="{{ uploaded_asset($v->thumbnail_img) }}" class="img-thumbnail border-0" style="height: 185px;width: 100%;object-fit: cover;"/>
                            @if (addon_is_activated('club_point') && $v->earn_point > 0)
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">{{ $v->earn_point }}</span></div>
                            @else
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">0</span></div>
                            @endif
                        </div>
                        <div class="pl-3 pt-3 pr-2 pb-2 col-md-9 border-left col-xs-8">
                            <div class="row">
                                <div class="col-md-7 col-sm-12 cat-title">
                                    @if($v->category)
                                    <h6 style="font-size: 15px;font-weight: 600;">{{ substr($v->category->name, 0, 20) }}</h6>
                                    @endif
                                    <h4 class="text-primary cat-sub">{{ substr($v->name, 0, 20) }} &nbsp;&nbsp;<span style="font-size:12px;">{{ $v->brand->name ?? '' }}</span></h4>
                                    <h5 class="text-primary rating-list">
                                        @php
                                        $total = 0;
                                        $total += $v->reviews->count();
                                        @endphp
                                        <span class="rating" style="font-size: 15px;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($total >= $i) {
                                                    ?>
                                                    <span class="fa fa-star"></span>
                                                <?php } else { ?>
                                                    <span class="fa fa-star-o"></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php /* {{ renderStarRating($v->rating) }} */ ?>
                                        </span>
                                        <span style="font-size: 12px;">({{ $total }} {{ translate('reviews')}})</span>
                                    </h5>

                                    <div class="fs-15">
                                        <del class="fw-600 opacity-50 mr-1">Rs{{ $v->unit_price }}</del>
                                        <span class="fw-700 text-primary cat-price">Rs{{ $v->unit_price - $v->discount }} 
                                            @if(!empty($v->unit) && $v->unit > 0)
                                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $v->getTranslation('unit') }} mins</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="text-right m-0" >
                                        <!--                                                    <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="opacity-50 my-2">{{ translate('Share') }}:</div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="aiz-share"></div>
                                                                                                </div>
                                                                                            </div>-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if(isset($v->referral_code_url))
                                                <div>
                                                    <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="{{ translate('Copied')}}" onclick="CopyToClipboard(this)" data-url="{{$v->referral_code_url}}">{{ isset($v->referral_commission) ? $v->referral_commission : translate('Copy the Promote Link')}}</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <?php
                                    /* <h5 class="text-primary" style="font-size: 14px;color: #000 !important;">
                                      {!! substr((strip_tags($v->description) ?? 'N/A'), 0, 80) !!}
                                      </h5> */
                                    ?>
                                    <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background-color: #14a800;" onclick="showAddToCartModal(<?= $v->id ?>)" data-toggle="tooltip"  data-placement="left" tabindex="0" data-original-title="" title="">
                                        View Details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right m-2 catbtnList">
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToWishList(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="la la-heart-o" style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToCompare(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to compare" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-sync"  style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="directAddToCart(<?= $v->id ?>)" class="addcart-btn<?= $v->id ?>" data-toggle="tooltip" data-title="Add to cart" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-shopping-cart"  style="font-size: 25px;"></i>
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
    @endif
    <!-- =============================-->
    @if(isset($auction_products) && count($auction_products))
    <h2 class="mt-3 pt-3 pl-0 top-catTitle container" id="aucp" style="/* background: rgb(37, 211, 102); *//* padding: 15px; */font-size: 30px;font-weight: 700;text-transform: uppercase;color: rgb(37, 211, 102);">
        <img class="cat-image lazyload mr-2"
             src="{{ static_asset('assets/img/auctions.png') }}"
             width="60">
        <span>{{ translate('Auction Products') }}</span>
    </h2>
    @foreach($auction_products as $k=>$v)
    <section class="page-section my-3 pr{{ $v->id }}" id="aucp{{ $v->id }}">
        <div class="container" style="background-color: #ffffff;">
            <!--<h2 class="section-title"></h2>-->
            <div class="row" id="Xp{{ $v->category ? (($v->category->parent_id !== 0)? $v->category->parent_id: $v->category->id) : 0 }}">
                <div class="col-md-12">
                    <div class="row shadow rounded">
                        <div class="p-0 col-md-3 col-xs-4" >
                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $v->unit_price > 0 ? floor(($v->discount/$v->unit_price)*100) : '0.0' }}%</span></span>
                            <img src="{{ uploaded_asset($v->thumbnail_img) }}" class="img-thumbnail border-0" style="height: 185px;width: 100%;object-fit: cover;"/>
                            @if (addon_is_activated('club_point') && $v->earn_point > 0)
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">{{ $v->earn_point }}</span></div>
                            @else
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">0</span></div>
                            @endif
                        </div>
                        <div class="pl-3 pt-3 pr-2 pb-2 col-md-9 border-left col-xs-8">
                            <div class="row">
                                <div class="col-md-7 col-sm-12 cat-title">
                                    @if($v->category)
                                    <h6 style="font-size: 15px;font-weight: 600;">{{ substr($v->category->name, 0, 20) }}</h6>
                                    @endif
                                    <h4 class="text-primary cat-sub">{{ substr($v->name, 0, 20) }} &nbsp;&nbsp;<span style="font-size:12px;">{{ $v->brand->name ?? '' }}</span></h4>
                                    <h5 class="text-primary rating-list">
                                        @php
                                        $total = 0;
                                        $total += $v->reviews->count();
                                        @endphp
                                        <span class="rating" style="font-size: 15px;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($total >= $i) {
                                                    ?>
                                                    <span class="fa fa-star"></span>
                                                <?php } else { ?>
                                                    <span class="fa fa-star-o"></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php /* {{ renderStarRating($v->rating) }} */ ?>
                                        </span>
                                        <span style="font-size: 12px;">({{ $total }} {{ translate('reviews')}})</span>
                                    </h5>

                                    <div class="row no-gutters mt-1 mb-1">
                                        <div class="col-sm-12">
                                            @if($v->auction_end_date > strtotime("now"))
                                            <div class="aiz-count-down align-items-center" data-date="{{ date('Y/m/d H:i:s', $v->auction_end_date) }}"></div>
                                            @else
                                            <p>Ended</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="fs-15 mt-2">
                                        <span class="fw-600 opacity-50 mr-1">{{ translate('Starting Bid')}}:</span>
                                        <span class="fw-700 text-primary cat-price">
                                            {{ single_price($v->starting_bid) }}
                                            @if(!empty($v->unit) && $v->unit > 0)
                                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $v->getTranslation('unit') }} mins</span>
                                            @endif
                                        </span>
                                    </div>

                                    @if(Auth::check() && Auth::user()->product_bids->where('product_id',$v->id)->first() != null)                                    
                                    <div class="fs-15 mt-2">
                                        <span class="fw-600 opacity-50 mr-1">{{ translate('My Bidded Amount')}}:</span>
                                        <span class="fw-700 text-primary cat-price">
                                            {{ single_price(Auth::user()->product_bids->where('product_id',$v->id)->first()->amount) }}
                                        </span>
                                    </div>
                                    @endif

                                    @php $highest_bid = $v->bids->max('amount'); @endphp

                                    @if($highest_bid != null)
                                    <div class="fs-15 mt-2">
                                        <span class="fw-600 opacity-50 mr-1">{{ translate('Highest Bid')}}:</span>
                                        <span class="fw-700 text-primary cat-price">
                                            {{ single_price($highest_bid) }}
                                        </span>
                                    </div>
                                    @endif

                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="text-right m-0" >
                                        <!--                                                    <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="opacity-50 my-2">{{ translate('Share') }}:</div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="aiz-share"></div>
                                                                                                </div>
                                                                                            </div>-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if(isset($v->referral_code_url))
                                                <div>
                                                    <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="{{ translate('Copied')}}" onclick="CopyToClipboard(this)" data-url="{{$v->referral_code_url}}">{{ isset($v->referral_commission) ? $v->referral_commission : translate('Copy the Promote Link')}}</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php $min_bid_amount = $highest_bid != null ? $highest_bid+1 : $v->starting_bid; @endphp
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <?php
                                    /* <h5 class="text-primary" style="font-size: 14px;color: #000 !important;">
                                      {!! substr((strip_tags($v->description) ?? 'N/A'), 0, 80) !!}
                                      </h5> */
                                    ?>
                                    <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background-color: #14a800;" onclick="showAddToCartModal(<?= $v->id ?>)" data-toggle="tooltip"  data-placement="left" tabindex="0" data-original-title="" title="">
                                        View Details
                                    </a>

                                    @if($v->auction_end_date >= strtotime("now"))
                                    @if(Auth::check() && $v->user_id == Auth::user()->id)
                                    @else
                                    <button type="button" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" onclick="bid_modal(<?= $v->id ?>)">
                                        <i class="las la-gavel"></i>
                                        @if(Auth::check() && Auth::user()->product_bids->where('product_id',$v->id)->first() != null)
                                        {{ translate('Change Bid')}}
                                        @else
                                        {{ translate('Place Bid')}}
                                        @endif
                                    </button>
                                    @endif
                                    @endif

                                </div>
                            </div>
                            @if($v->auction_end_date >= strtotime("now"))
                            @if(Auth::check() && $v->user_id == Auth::user()->id)
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <div class="mt-2 badge badge-inline badge-danger">{{ translate('Seller Can Not Place Bid to His Own Product') }}</div>
                                </div>
                            </div>
                            @endif
                            @endif                                    
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right m-2 catbtnList">
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToWishList(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="la la-heart-o" style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToCompare(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to compare" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-sync"  style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="directAddToCart(<?= $v->id ?>)" class="addcart-btn<?= $v->id ?>" data-toggle="tooltip" data-title="Add to cart" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-shopping-cart"  style="font-size: 25px;"></i>
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

    <div class="bid-form{{ $v->id }}" style="display: none;">


        <form class="form-horizontal" action="{{ route('auction_product_bids.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $v->id }}">
            <div class="form-group">
                <label class="form-label">
                    {{translate('Place Bid Price')}}
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <span class="d-none min_bid_amount{{ $v->id }}">{{ $min_bid_amount }}</span>
                    <input type="number" step="0.01" class="form-control form-control-sm" name="amount" min="{{ $min_bid_amount }}" placeholder="{{ translate('Enter Amount') }}" required>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1">{{ translate('Submit') }}</button>
            </div>
        </form>
    </div>
    @endforeach
    @endif
    @foreach($producstList as $key => $category)
    <h2 class="mt-3 pt-3 pl-0 top-catTitle container" id="p{{ $category->parent_id !== 0 ? $category->parent_id: $category->id }}" style="/* background: rgb(37, 211, 102); *//* padding: 15px; */font-size: 30px;font-weight: 700;text-transform: uppercase;color: rgb(37, 211, 102);">
        <!--<h2 class="mt-5 pt-3 container" id="p{{ $category->parent_id !== 0 ? $category->parent_id: $category->id }}" style="/* background: rgb(37, 211, 102); *//* padding: 15px; */font-size: 30px;font-weight: 700;text-transform: uppercase;color: rgb(37, 211, 102);">-->
        <img class="cat-image lazyload mr-2"
             src="{{ uploaded_asset($category->icon) }}"
             width="60">
        <span>{{ $category['name'] }}</span>
    </h2>
    @foreach($category['products'] as $k=>$v)
    <section class="page-section my-3 pr{{ $v->id }}" id="sub{{ $v->category_id }}">
        <div class="container" style="background-color: #ffffff;">
            <!--<h2 class="section-title"></h2>-->
            <div class="row" id="Xp{{ $v->category ? (($v->category->parent_id !== 0)? $v->category->parent_id: $v->category->id) : 0 }}">
                <div class="col-md-12">
                    <div class="row shadow rounded">
                        <div class="p-0 col-md-3 col-xs-4" >
                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;{{ $v->unit_price > 0 ? floor(($v->discount/$v->unit_price)*100) : '0.0' }}%</span></span>
                            <img src="{{ uploaded_asset($v->thumbnail_img) }}" class="img-thumbnail border-0" style="height: 185px;width: 100%;object-fit: cover;"/>
                            @if (addon_is_activated('club_point') && $v->earn_point > 0)
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">{{ $v->earn_point }}</span></div>
                            @else
                            <div class="px-2 mt-0 cat-club">{{  translate('Club Point') }}:<span class="fw-700 float-right">0</span></div>
                            @endif
                        </div>
                        <div class="pl-3 pt-3 pr-2 pb-2 col-md-9 border-left col-xs-8">
                            <div class="row">
                                <div class="col-md-7 col-sm-12 cat-title">
                                    @if($v->category)
                                    <h6 style="font-size: 15px;font-weight: 600;">{{ substr($v->category->name, 0, 20) }}</h6>
                                    @endif
                                    <h4 class="text-primary cat-sub">{{ substr($v->name, 0, 20) }} &nbsp;&nbsp;<span style="font-size:12px;">{{ $v->brand->name ?? '' }}</span></h4>
                                    <h5 class="text-primary rating-list">
                                        @php
                                        $total = 0;
                                        $total += $v->reviews->count();
                                        @endphp
                                        <span class="rating" style="font-size: 15px;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($total >= $i) {
                                                    ?>
                                                    <span class="fa fa-star"></span>
                                                <?php } else { ?>
                                                    <span class="fa fa-star-o"></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php /* {{ renderStarRating($v->rating) }} */ ?>
                                        </span>
                                        <span style="font-size: 12px;">({{ $total }} {{ translate('reviews')}})</span>
                                    </h5>

                                    <div class="fs-15">
                                        <del class="fw-600 opacity-50 mr-1">Rs{{ $v->unit_price }}</del>
                                        <span class="fw-700 text-primary cat-price">Rs{{ $v->unit_price - $v->discount }} 
                                            @if(!empty($v->unit) && $v->unit > 0)
                                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $v->getTranslation('unit') }} mins</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="text-right m-0" >
                                        <!--                                                    <div class="row">
                                                                                                <div class="col-sm-2">
                                                                                                    <div class="opacity-50 my-2">{{ translate('Share') }}:</div>
                                                                                                </div>
                                                                                                <div class="col-sm-10">
                                                                                                    <div class="aiz-share"></div>
                                                                                                </div>
                                                                                            </div>-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @if(isset($v->referral_code_url))
                                                <div>
                                                    <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="{{ translate('Copied')}}" onclick="CopyToClipboard(this)" data-url="{{$v->referral_code_url}}">{{ isset($v->referral_commission) ? $v->referral_commission : translate('Copy the Promote Link')}}</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <?php
                                    /* <h5 class="text-primary" style="font-size: 14px;color: #000 !important;">
                                      {!! substr((strip_tags($v->description) ?? 'N/A'), 0, 80) !!}
                                      </h5> */
                                    ?>
                                    <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md" style="background-color: #14a800;" onclick="showAddToCartModal(<?= $v->id ?>)" data-toggle="tooltip"  data-placement="left" tabindex="0" data-original-title="" title="">
                                        View Details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right m-2 catbtnList">
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToWishList(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="la la-heart-o" style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="addToCompare(<?= $v->id ?>)" data-toggle="tooltip" data-title="Add to compare" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-sync"  style="font-size: 21px;"></i>
                                        </a>
                                        <a href="javascript:void(0)" style="/* position: relative; *//* right: 0; */margin-right: 7px;" onclick="directAddToCart(<?= $v->id ?>)" class="addcart-btn<?= $v->id ?>" data-toggle="tooltip" data-title="Add to cart" data-placement="bottom" tabindex="0" data-original-title="" title="">
                                            <i class="las la-shopping-cart"  style="font-size: 25px;"></i>
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


<div class="modal fade" id="bid_for_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Bid For Product') }} <small>({{ translate('Min Bid Amount: ') }} . <span class="min_bid_amount_txt"></span>)</small> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="bid-form-content">

                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


<script src='https://unpkg.com/smoothscroll-polyfill/dist/smoothscroll.min.js'></script>
<script src='https://unpkg.com/smoothscroll-anchor-polyfill'></script>
<!--<script  src="./script.js"></script>-->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<!--<script src="{{ static_asset('catlayout/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>-->
<script src="{{ static_asset('assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ static_asset('catlayout/script.js') }}"></script>

<script type="text/javascript">
//                                            var $ = $.noConflict(true);
                                            //$(document).on('ready', function () {
//                                            if ($(window).width() > 1200) {
//                                            $(".regular").slick({
//                                            dots: false,
//                                                    infinite: true,
//                                                    slidesToShow: 3,
//                                                    slidesToScroll: 3
//                                            });
//                                            } else{
//                                            $(".regular").slick({
//                                            dots: false,
//                                                    infinite: true,
//                                                    slidesToShow: 1,
//                                                    slidesToScroll: 1
//                                            });
//                                            }
//                                            $(".lazy").slick({
//                                            lazyLoad: 'ondemand', // ondemand progressive anticipated
//                                                    infinite: true
//                                            });
                                            //});
                                            $(document).ready(function () {
<?php
if (count($childrenCategories)) {
    foreach ($childrenCategories as $key => $childrenCat) {
        ?>
                                                        //                if ($('.subcat-slider-<?= $categoryIds[$key] ?>').length > 0) {
                                                        //                    $('.subcat-slider-<?= $categoryIds[$key] ?>').owlCarousel({
                                                        //                        margin: 10,
                                                        //                        //nav: true,
                                                        //                        loop: true,
                                                        //                        dots: false,
                                                        //                        responsive: {
                                                        //                            0: {
                                                        //                                items: 1
                                                        //                            },
                                                        //                            600: {
                                                        //                                items: 1
                                                        //                            },
                                                        //                            1000: {
                                                        //                                items: 3
                                                        //                            }
                                                        //                        }
                                                        //                    });
                                                        //                }
        <?php
    }
    ?>
                                                    $('.menu-open-subcat').hide();
    <?php
}
?>
                                                var existSlickIds = [];
                                                $('.open-subcat').click(function () {
                                                    $('.opencat-active').removeClass('opencat-active');
                                                    $(this).addClass('opencat-active');
                                                    $('.menu-open-subcat').hide();
                                                    var $id = $(this).attr("id");
                                                    if ($id != 0) {
                                                        $('.categoryId' + $id).show();
                                                        if ($.inArray(parseInt($id), existSlickIds) >= 0) {

                                                        } else {
                                                            if ($('.subcat-slider-' + $id).length > 0) {
                                                                existSlickIds.push(parseInt($id));
//                                                                $('.subcat-slider-' + $id).owlCarousel({
//                                                                    margin: 10,
//                                                                    nav: true,
//                                                                    loop: true,
//                                                                    dots: false,
//                                                                    responsive: {
//                                                                        0: {
//                                                                            items: 1
//                                                                        },
//                                                                        600: {
//                                                                            items: 1
//                                                                        },
//                                                                        1000: {
//                                                                            items: 3
//                                                                        }
//                                                                    }
//                                                                });
//                                            if ($(window).width() > 1200) {
//                                            $('.subcat-slider-' + $id).slick({
//                                            infinite: true,
//                                                    slidesToShow: 3,
//                                                    slidesToScroll: 3
//                                            });
//                                            } else{
//                                            $('.subcat-slider-' + $id).slick({
//                                            infinite: true,
//                                                    slidesToShow: 1,
//                                                    slidesToScroll: 1
//                                            });
//                                            }
                                                            }
                                                        }
                                                    }

                                                });
                                                $('.click-subcat').click(function () {
                                                    $('.opensubcat-active').removeClass('opensubcat-active');
                                                    $(this).addClass('opensubcat-active');
                                                });
                                            });
</script>

<script>
    $(document).ready(function () {
        var jq = $.noConflict(true);
        jq('.owl-carousel').owlCarousel({
            margin: 10,
            nav: true,
            loop: false,
            rewind: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        })
    })
</script>
<script>
    $(document).ready(function () {
        var url = window.location.href;
        var arr = url.split('#');
        var number = 1;
        if (number in arr) {
            var $prId = arr[1];
            if ($('.' + $prId).length > 0) {
                $('html, body').animate({
                    scrollTop: $('.' + $prId).offset().top - 150
                }, 'slow');
            }
        }
    });
</script>
<script>

    function CopyToClipboard(e) {
        var url = $(e).data('url');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(url).select();
        try {
            document.execCommand("copy");
            AIZ.plugins.notify('success', '<?= translate('Link copied to clipboard') ?>');
        } catch (err) {
            AIZ.plugins.notify('danger', '<?= translate('Oops, unable to copy') ?>');
        }
        $temp.remove();
        // if (document.selection) {
        //     var range = document.body.createTextRange();
        //     range.moveToElementText(document.getElementById(containerid));
        //     range.select().createTextRange();
        //     document.execCommand("Copy");

        // } else if (window.getSelection) {
        //     var range = document.createRange();
        //     document.getElementById(containerid).style.display = "block";
        //     range.selectNode(document.getElementById(containerid));
        //     window.getSelection().addRange(range);
        //     document.execCommand("Copy");
        //     document.getElementById(containerid).style.display = "none";

        // }
        // AIZ.plugins.notify('success', 'Copied');
    }
</script>
<script type="text/javascript">

    function bid_modal($id) {
<?php if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller')) { ?>
            $('#bid_for_product .min_bid_amount_txt').html(null).html('Rs' + $('.min_bid_amount' + $id).text());
            var $bidBody = $('.bid-form' + $id).html();
            $('#bid_for_product .bid-form-content').html(null).html($bidBody);
            $('#bid_for_product').modal('show');
<?php } else { ?>
            AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
<?php } ?>
    }
</script>

@endsection
