<style>
    .related-product-div .slick-prev:before, .related-product-div .slick-next:before{
        line-height: 2;
    }
    .related-product-div .slick-arrow .las{
        /*display: none;*/
    }
</style>
<div class="modal-body p-4 c-scrollbar-light">
    <div class="row">
        <div class="col-lg-6">
            <div class="row gutters-10 flex-row-reverse">
                @php
                $photos = explode(',',$product->photos);
                @endphp
                <div class="col">
                    <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'>
                        @foreach ($photos as $key => $photo)
                        <div class="carousel-box img-zoom rounded">
                            <img
                                class="img-fluid lazyload"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($photo) }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                        </div>
                        @endforeach
                        @foreach ($product->stocks as $key => $stock)
                        @if ($stock->image != null)
                        <div class="carousel-box img-zoom rounded">
                            <img
                                class="img-fluid lazyload"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($stock->image) }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-auto w-90px">
                    <div class="aiz-carousel carousel-thumb product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-focus-select='true'>
                        @foreach ($photos as $key => $photo)
                        <div class="carousel-box c-pointer border p-1 rounded">
                            <img
                                class="lazyload mw-100 size-60px mx-auto"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($photo) }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                        </div>
                        @endforeach
                        @foreach ($product->stocks as $key => $stock)
                        @if ($stock->image != null)
                        <div class="carousel-box c-pointer border p-1 rounded" data-variation="{{ $stock->variant }}">
                            <img
                                class="lazyload mw-100 size-50px mx-auto"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($stock->image) }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                >
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            @if($product->auction_product == 1)

            <div class="text-left">
                <h1 class="mb-2 fs-20 fw-600">
                    {{ $product->getTranslation('name') }}
                </h1>

                <div class="row align-items-center">
                    @if ($product->est_shipping_days)
                    <div class="col-auto ml">
                        <small class="mr-2 opacity-50">{{ translate('Estimate Shipping Time')}}: </small>{{ $product->est_shipping_days }} {{  translate('Days') }}
                    </div>
                    @endif
                </div>

                <hr>

                <div class="row align-items-center">
                    <div class="col-auto">
                        <small class="mr-2 opacity-50">{{ translate('Sold by')}}: </small><br>
                        @if ($product->added_by == 'seller' && get_setting('vendor_system_activation') == 1)
                        <a href="{{ route('shop.visit', $product->user->shop->slug) }}" class="text-reset">{{ $product->user->shop->name }}</a>
                        @else
                        {{  translate('Inhouse product') }}
                        @endif
                    </div>

                    @if ($product->brand != null)
                    <div class="col-auto">
                        <a href="{{ route('products.brand',$product->brand->slug) }}">
                            <img src="{{ uploaded_asset($product->brand->logo) }}" alt="{{ $product->brand->getTranslation('name') }}" height="30">
                        </a>
                    </div>
                    @endif
                </div>

                <hr>

                <div class="row no-gutters mt-3">
                    <div class="col-sm-2">
                        <div class="opacity-50 my-2">{{ translate('Starting Bid')}}:</div>
                    </div>
                    <div class="col-sm-10">
                        <span class="opacity-50 fs-20">
                            {{ single_price($product->starting_bid) }}
                        </span>
                        @if($product->unit != null)
                        <span class="opacity-70"> 🕒 {{ $product->getTranslation('unit') }} mins</span>
                        @endif
                    </div>
                </div>
                <hr>

                @if(Auth::check() && Auth::user()->product_bids->where('product_id',$product->id)->first() != null)
                <div class="row no-gutters">
                    <div class="col-sm-2">
                        <div class="opacity-50">{{ translate('My Bidded Amount')}}:</div>
                    </div>
                    <div class="col-sm-10">
                        <span class="opacity-50 fs-20">
                            {{ single_price(Auth::user()->product_bids->where('product_id',$product->id)->first()->amount) }}
                        </span>
                    </div>
                </div>
                <hr>
                @endif

                @php $highest_bid = $product->bids->max('amount'); @endphp
                @if($highest_bid != null)
                <div class="row no-gutters my-2">
                    <div class="col-sm-2">
                        <div class="opacity-50">{{ translate('Highest Bid')}}:</div>
                    </div>
                    <div class="col-sm-10">
                        <strong class="h3 fw-600 text-primary">
                            {{ single_price($highest_bid) }}
                        </strong>
                    </div>
                </div>
                @endif
            </div>

            @else
            <div class="text-left">
                <h2 class="mb-2 fs-20 fw-600">
                    {{  $product->getTranslation('name')  }}
                </h2>

                @if(!empty($product->category))
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="opacity-50">{{ translate('Category')}}:</div>
                    </div>
                    <div class="col-10">
                        <div class="opacity-60">
                            <b>{{ $product->category->name }}</b>
                        </div>
                    </div>
                </div>
                @endif

                @if(home_price($product) != home_discounted_price($product))
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="opacity-50 mt-2">{{ translate('Price')}}:</div>
                    </div>
                    <div class="col-10">
                        <div class="fs-20 opacity-60">
                            <del>
                                {{ home_price($product) }}
                            </del>
                        </div>
                    </div>
                </div>

                <div class="row no-gutters mt-2">
                    <div class="col-2">
                        <div class="opacity-50">{{ translate('Discount Price')}}:</div>
                    </div>
                    <div class="col-10">
                        <div class="">
                            <strong class="h2 fw-600 text-primary">
                                {{ home_discounted_price($product) }}
                            </strong>
                            @if(!empty($product->unit) && $product->unit > 0)
                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $product->getTranslation('unit') }} mins</span>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="opacity-50">{{ translate('Price')}}:</div>
                    </div>
                    <div class="col-10">
                        <div class="">
                            <strong class="h2 fw-600 text-primary">
                                {{ home_discounted_price($product) }}
                            </strong>
                            @if(!empty($product->unit) && $product->unit > 0)
                            <span style="color: #8d8d94;font-weight: 500;font-size: 14px;margin-left: 5px;"> 🕒 {{ $product->getTranslation('unit') }} mins</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                @if (addon_is_activated('club_point') && $product->earn_point > 0)
                <div class="row no-gutters mt-4">
                    <div class="col-2">
                        <div class="opacity-50">{{  translate('Club Point') }}:</div>
                    </div>
                    <div class="col-10">
                        <div class="d-inline-block club-point bg-soft-primary px-3 py-1 border">
                            <span class="strong-700">{{ $product->earn_point }}</span>
                        </div>
                    </div>
                </div>
                @endif

                <hr>

                @php
                $qty = 0;
                foreach ($product->stocks as $key => $stock) {
                $qty += $stock->qty;
                }
                @endphp

                <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <!-- Quantity + Add to cart -->
                    @if($product->digital !=1)
                    @if ($product->choice_options != null)
                    @foreach (json_decode($product->choice_options) as $key => $choice)

                    <div class="row no-gutters">
                        <div class="col-2">
                            @php
                            $attr = \App\Models\Attribute::find($choice->attribute_id);
                            @endphp
                            <div class="opacity-50 mt-2 ">{{ $attr ? $attr->getTranslation('name') : 'Attribute' }}:</div>
                        </div>
                        <div class="col-10">
                            <div class="aiz-radio-inline">
                                @foreach ($choice->values as $key => $value)
                                <label class="aiz-megabox pl-0 mr-2">
                                    <input
                                        type="radio"
                                        name="attribute_id_{{ $choice->attribute_id }}"
                                        value="{{ $value }}"
                                        @if($key == 0) checked @endif
                                        >
                                        <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                        {{ $value }}
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                    @if (count(json_decode($product->colors)) > 0)
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="opacity-50 mt-2">{{ translate('Color')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="aiz-radio-inline">
                                @foreach (json_decode($product->colors) as $key => $color)
                                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Models\Color::where('code', $color)->first()->name }}">
                                    <input
                                        type="radio"
                                        name="color"
                                        value="{{ \App\Models\Color::where('code', $color)->first()->name }}"
                                        @if($key == 0) checked @endif
                                        >
                                        <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                        <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr>
                    @endif

                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="opacity-50 mt-2">{{ translate('Quantity')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                    <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="quantity" disabled="">
                                        <i class="las la-minus"></i>
                                    </button>
                                    <input type="number" name="quantity" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $product->min_qty }}" min="{{ $product->min_qty }}" max="10" lang="en">
                                    <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="quantity">
                                        <i class="las la-plus"></i>
                                    </button>
                                </div>
                                <div class="avialable-amount opacity-60">
                                    @if($product->stock_visibility_state == 'quantity')
                                    (<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}})
                                    @elseif($product->stock_visibility_state == 'text' && $qty >= 1)
                                    (<span id="available-quantity">{{ translate('In Stock') }}</span>)
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    @endif

                    <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="opacity-50">{{ translate('Total Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price" class="h4 fw-600 text-primary">

                                </strong>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="mt-3">
                    @if ($product->digital == 1)
                    <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                        <i class="la la-shopping-cart"></i>
                        <span class="d-none d-md-inline-block">{{ translate('Add to cart')}}</span>
                    </button>
                    @elseif($qty > 0)
                    @if ($product->external_link != null)
                    <a type="button" class="btn btn-soft-primary mr-2 add-to-cart fw-600" href="{{ $product->external_link }}">
                        <i class="las la-share"></i>
                        <span class="d-none d-md-inline-block">{{ translate($product->external_link_btn)}}</span>
                    </a>
                    @else
                    <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                        <i class="la la-shopping-cart"></i>
                        <span class="d-none d-md-inline-block">{{ translate('Add to cart')}}</span>
                    </button>
                    @endif
                    @endif
                    <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                        <i class="la la-cart-arrow-down"></i>{{ translate('Out of Stock')}}
                    </button>
                </div>

            </div>
            @endif
        </div>

    </div>

    <div class="container mb-4">
        <div class="row gutters-10">
            <?php
            /* <div class="col-xl-3 order-1 order-xl-0">
              @if ($product->added_by == 'seller' && $product->user->shop != null)
              <div class="bg-white shadow-sm mb-3">
              <div class="position-relative p-3 text-left">
              @if ($product->user->shop->verification_status)
              <div class="absolute-top-right p-2 bg-white z-1">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2" width="22" height="34">
              <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
              <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
              <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
              <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
              60,116.6 124.1,116.6 "/>
              </svg>
              </div>
              @endif
              <div class="opacity-50 fs-12 border-bottom">{{ translate('Sold by')}}</div>
              <a href="{{ route('shop.visit', $product->user->shop->slug) }}" class="text-reset d-block fw-600">
              {{ $product->user->shop->name }}
              @if ($product->user->shop->verification_status == 1)
              <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
              @else
              <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
              @endif
              </a>
              <div class="location opacity-70">{{ $product->user->shop->address }}</div>
              <div class="text-center border rounded p-2 mt-3">
              <div class="rating">
              @if ($total > 0)
              {{ renderStarRating($product->user->shop->rating) }}
              @else
              {{ renderStarRating(0) }}
              @endif
              </div>
              <div class="opacity-60 fs-12">({{ $total }} {{ translate('customer reviews')}})</div>
              </div>
              </div>
              <div class="row no-gutters align-items-center border-top">
              <div class="col">
              <a href="{{ route('shop.visit', $product->user->shop->slug) }}" class="d-block btn btn-soft-primary rounded-0">{{ translate('Visit Store')}}</a>
              </div>
              <div class="col">
              <ul class="social list-inline mb-0">
              <li class="list-inline-item mr-0">
              <a href="{{ $product->user->shop->facebook }}" class="facebook" target="_blank">
              <i class="lab la-facebook-f opacity-60"></i>
              </a>
              </li>
              <li class="list-inline-item mr-0">
              <a href="{{ $product->user->shop->google }}" class="google" target="_blank">
              <i class="lab la-google opacity-60"></i>
              </a>
              </li>
              <li class="list-inline-item mr-0">
              <a href="{{ $product->user->shop->twitter }}" class="twitter" target="_blank">
              <i class="lab la-twitter opacity-60"></i>
              </a>
              </li>
              <li class="list-inline-item">
              <a href="{{ $product->user->shop->youtube }}" class="youtube" target="_blank">
              <i class="lab la-youtube opacity-60"></i>
              </a>
              </li>
              </ul>
              </div>
              </div>
              </div>
              @endif
              <div class="bg-white rounded shadow-sm mb-3">
              <div class="p-3 border-bottom fs-16 fw-600">
              {{ translate('Top Selling Products')}}
              </div>
              <div class="p-3">
              <ul class="list-group list-group-flush">
              @foreach (filter_products(\App\Models\Product::where('user_id', $product->user_id)->orderBy('num_of_sale', 'desc'))->limit(6)->get() as $key => $top_product)
              <li class="py-3 px-0 list-group-item border-light">
              <div class="row gutters-10 align-items-center">
              <div class="col-5">
              <a href="{{ route('product', $top_product->slug) }}" class="d-block text-reset">
              <img
              class="img-fit lazyload h-xxl-110px h-xl-80px h-120px"
              src="{{ static_asset('assets/img/placeholder.jpg') }}"
              data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
              alt="{{ $top_product->getTranslation('name') }}"
              onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
              >
              </a>
              </div>
              <div class="col-7 text-left">
              <h4 class="fs-13 text-truncate-2">
              <a href="{{ route('product', $top_product->slug) }}" class="d-block text-reset">{{ $top_product->getTranslation('name') }}</a>
              </h4>
              <div class="rating rating-sm mt-1">
              {{ renderStarRating($top_product->rating) }}
              </div>
              <div class="mt-2">
              <span class="fs-17 fw-600 text-primary">{{ home_discounted_base_price($top_product) }}</span>
              </div>
              </div>
              </div>
              </li>
              @endforeach
              </ul>
              </div>
              </div>
              </div> */
            ?>
            <div class="col-xl-12 order-0 order-xl-1">
                <div class="bg-white mb-3 shadow-sm rounded">
                    <div class="nav border-bottom aiz-nav-tabs">
                        <a href="#tab_default_1" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset active show">{{ translate('Description')}}</a>
                        @if($product->video_link != null)
                        <a href="#tab_default_2" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset">{{ translate('Video')}}</a>
                        @endif
                        @if($product->pdf != null)
                        <a href="#tab_default_3" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset">{{ translate('Downloads')}}</a>
                        @endif
                        <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset">{{ translate('Reviews')}}</a>
                    </div>

                    <div class="tab-content pt-0">
                        <div class="tab-pane fade active show" id="tab_default_1">
                            <div class="p-4">
                                <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                                    {!! $product->getTranslation('description') !!}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab_default_2">
                            <div class="p-4">
                                <div class="embed-responsive embed-responsive-16by9">
                                    @if ($product->video_provider == 'youtube' && isset(explode('=', $product->video_link)[1]))
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ get_url_params($product->video_link, 'v') }}"></iframe>
                                    @elseif ($product->video_provider == 'dailymotion' && isset(explode('video/', $product->video_link)[1]))
                                    <iframe class="embed-responsive-item" src="https://www.dailymotion.com/embed/video/{{ explode('video/', $product->video_link)[1] }}"></iframe>
                                    @elseif ($product->video_provider == 'vimeo' && isset(explode('vimeo.com/', $product->video_link)[1]))
                                    <iframe src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $product->video_link)[1] }}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_default_3">
                            <div class="p-4 text-center ">
                                <a href="{{ uploaded_asset($product->pdf) }}" class="btn btn-primary">{{  translate('Download') }}</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_default_4">
                            <div class="p-4">
                                <ul class="list-group list-group-flush">
                                    @foreach ($product->reviews as $key => $review)
                                    @if($review->user != null)
                                    <li class="media list-group-item d-flex">
                                        <span class="avatar avatar-md mr-3">
                                            <img
                                                class="lazyload"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                @if($review->user->avatar_original !=null)
                                                data-src="{{ uploaded_asset($review->user->avatar_original) }}"
                                                @else
                                                data-src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                @endif
                                                >
                                        </span>
                                        <div class="media-body text-left">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="fs-15 fw-600 mb-0">{{ $review->user->name }}</h3>
                                                <span class="rating rating-sm">
                                                    @for ($i=0; $i < $review->rating; $i++)
                                                    <i class="las la-star active"></i>
                                                    @endfor
                                                    @for ($i=0; $i < 5-$review->rating; $i++)
                                                    <i class="las la-star"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            <div class="opacity-60 mb-2">{{ date('d-m-Y', strtotime($review->created_at)) }}</div>
                                            <p class="comment-text">
                                                {{ $review->comment }}
                                            </p>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                                @if(count($product->reviews) <= 0)
                                <div class="text-center fs-18 opacity-70">
                                    {{  translate('There have been no reviews for this product yet.') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded shadow-sm related-product-div">
                    <div class="border-bottom p-3">
                        <h3 class="fs-16 fw-600 mb-0">
                            <span class="mr-4">{{ translate('Related products')}}</span>
                        </h3>
                    </div>
                    <div class="p-3">
                        <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="4" data-xl-items="3" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                            @php
                            $related_product_ids = \App\Models\ProductsAddon::where('product_id', $product->id)->where('addon_product_status', 1)->pluck('related_product_id')->toArray();
                            @endphp
                            @foreach (filter_products(\App\Models\Product::whereIn('id', $related_product_ids)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)
                            <?php /*@foreach (filter_products(\App\Models\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)*/ ?>
                            <div class="carousel-box">
                                <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                    <div class="position-relative">
                                        <a href="{{ route('product', $related_product->slug) }}" class="d-block">
                                            <img
                                                class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($related_product->thumbnail_img) }}"
                                                alt="{{ $related_product->getTranslation('name') }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                >
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="javascript:void(0)" onclick="addToWishList(<?= $related_product->id ?>)" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="addToCompare(<?= $related_product->id ?>)" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                                <i class="las la-sync"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="directAddToCart(<?= $related_product->id ?>)" class="addcart-btn<?= $related_product->id ?>" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2 text-left">
                                        <div class="fs-15">
                                            @if(home_base_price($related_product) != home_discounted_base_price($related_product))
                                            <del class="fw-600 opacity-50 mr-1">{{ home_base_price($related_product) }}</del>
                                            @endif
                                            <span class="fw-700 text-primary">{{ home_discounted_base_price($related_product) }}</span>
                                        </div>
                                        <div class="rating rating-sm mt-1">
                                            {{ renderStarRating($related_product->rating) }}
                                        </div>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                            <a href="{{ route('product', $related_product->slug) }}" class="d-block text-reset">{{ $related_product->getTranslation('name') }}</a>
                                        </h3>
                                        @if (addon_is_activated('club_point'))
                                        <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                            {{ translate('Club Point') }}:
                                            <span class="fw-700 float-right">{{ $related_product->earn_point }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#option-choice-form input').on('change', function () {
        getVariantPrice();
    });
</script>
