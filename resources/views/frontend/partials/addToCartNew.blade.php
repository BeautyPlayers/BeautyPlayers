@php
$photo = explode(',',$product->photos)[0];
$qty = 0;
foreach ($product->stocks as $key => $stock) {
$qty += $stock->qty;
}
@endphp

<style>
    @media only screen and (max-width: 425px) {
        .modal-content {
            width: 100% !important;
        }
    }
</style>
<div class="modal-container add-to-cart-modal" style="display: flex;justify-content:center;align-items:center;height: 100%;">
    <div class="row w-100 px-3" style="background-color: #fff; padding-top: 75px !important;">
        <div class="col-md-12">
            <div class="row">
                <div class=" col-md-4 my-2">
                    <img class="img-fluid img-header" src="{{ uploaded_asset($photo) }}" data-src="{{ uploaded_asset($photo) }}" onerror="if this.onerror=null this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" style="border-radius: 10px; height:190px !Important;">
                </div>
                <div class="col-md-8 my-2 p-2" style="background-color:#eee;border-radius: 10px;">
                    <div class="row">
                        <div class="col-md-8" style="height: 65px">
                            <h5 class="text-dark mt-1 mb-1 font-weight-bolder">{{ substr($product->getTranslation('name'),0,20)}}</h5>
                            <p> {{ substr($product->category->name, 0, 20) }} </p>
                        </div>
                        <div class="col-md-4">
                            <span>
                                {{-- <img src="https://classiq.in/wp-content/uploads/2020/12/loreal.png" alt=""
                                        style="width: 100px;height: 50px;border-radius: 10px;"> --}}
                                @if ($product->brand != null)
                                <div class="col-auto mb-1 p-0 brand-img-section">
                                    <a href="{{ route('products.brand',$product->brand->slug) }}" target="_blank">
                                        <img src="{{ uploaded_asset($product->brand->logo) }}" alt="{{ $product->brand->getTranslation('name') }}" {{-- class="shadow p-2 rounded" --}} style="width: 100px;height: 50px;border-radius: 10px;">
                                    </a>
                                </div>
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- Form ::START -->
                    <!-- Form for product submission -->
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
                                        <input type="radio" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key==0) checked @endif>
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
                        {{--
                        @if (count(json_decode($product->colors)) > 0)
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="opacity-50 mt-2">{{ translate('Color')}}:
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="aiz-radio-inline">
                                    @foreach (json_decode($product->colors) as $key => $color)
                                    <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Models\Color::where('code', $color)->first()->name }}">
                                        <input type="radio" name="color" value="{{ \App\Models\Color::where('code', $color)->first()->name }}" @if($key==0) checked @endif>
                                        <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                            <span class="size-30px d-inline-block rounded" style="background-color: #{{ \Str::limit($color,6,'') }};"></span>
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <hr>
                        @endif
                        --}}
                        <!-- Variation with Image ::START  -->
                        @if (count(json_decode($product->colors)) > 0)
                        <div class="row no-gutters">
                            <!-- <div class="col-2">
                                                <div class="opacity-50 mt-2">{{ translate('Color')}}:</div>
                                            </div> -->
                            <div class="col-10">
                                <div class="aiz-radio-inline">
                                    @foreach ($product->stocks as $key => $stock)
                                    <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ $stock->variant }}">
                                        <input type="radio" class="variation" name="color" value="{{ $stock->variant }}" @if($key==0) checked @endif>
                                        <span class="aiz-megabox-elem d-flex align-items-center justify-content-center p-1 mb-2">
                                            {{-- <span class="size-30px d-inline-block rounded" style="background-color: #{{ \Str::limit($color,6,'') }};"></span> --}}
                                        <img class="img-fluid {{$stock->image}}" src="{{ (!empty($stock->image))?uploaded_asset($stock->image):static_asset('assets/img/placeholder.jpg') }}" data-src="{{ (!empty($stock->image))?uploaded_asset($stock->image):static_asset('assets/img/placeholder.jpg') }}" onerror="if this.onerror=null this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" style="border-radius: 10px; width: 40px; height:40px; !Important;">
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- <hr> -->
                        @endif
                        <!-- Variation with Image ::END -->

                        <div class="row no-gutters" style="display: none">
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

                        <div class="row no-gutters pb-3 d-none" id="chosen_price_div" style="display: none">
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
                    <!-- Form ::END -->
                    <div>
                        <p class="two-11 mb-0" style="display: flex; justify-content: flex-start;">
                            @if(home_price($product) != home_discounted_price($product) )
                            <small  class="two-str" style="text-decoration: line-through;width:auto;font-size:1rem;">{{ home_price($product) }}</small>
                            @endif
                            <strong id="variationPrice" class="ml-3" style="font-size: 1.2rem;">{{ home_discounted_price($product) }}</strong>
                        </p>
                        <p class="mb-1" style="font-weight: 600">
                            <!-- <i class="fa-solid fa-clock"></i> -->
                            <img src="https://www.beautyplayers.com/public/uploads/all/RYspA4IVDo4a3k700tzDTfX3qcnau5I4FUjiNqqb.png" style="width: 25px;height: 25px;" alt="">
                            <span id="variationDuration">{{ $product->getTranslation('unit') }}</span> mins
                        </p>
                    </div>
                    {{-- <button type="submit" onclick="addToCart() class="btn btn-success btn-book-now" style="font-size: 1.3rem;"> BOOK
                            NOW</button> --}}
                    @if ($product->digital == 1)
                    <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                        {{-- <i class="la la-shopping-cart"></i> --}}
                        <span class="d-none d-md-inline-block">{{ translate('BOOK NOW')}}</span>
                    </button>
                    @elseif($qty > 0)
                    @if ($product->external_link != null)
                    <a type="button" class="btn btn-soft-primary mr-2 add-to-cart fw-600" href="{{ $product->external_link }}">
                        <i class="las la-share"></i>
                        <span class="d-none d-md-inline-block">{{ translate($product->external_link_btn)}}</span>
                    </a>
                    @else
                    <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                        {{-- <i class="la la-shopping-cart"></i> --}}
                        <span class="d-none d-md-inline-block">{{ translate('BOOK NOW')}}</span>
                    </button>
                    @endif
                    @endif
                    <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                        <i class="la la-cart-arrow-down"></i>{{ translate('Out of Stock')}}
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="m-4" style="font-weight: 600;">Description</h4>
            <div class="col-12" style="margin-left: 10px">
                {!! $product->getTranslation('description') !!}
            </div>
        </div>
        <div class="row my-5 col-md-12">
            <div class="col-md-12">
                <div class="swiper mySwiper card-slider">
                    <div class="swiper-wrapper">
                        @php
                        $related_product_ids = \App\Models\ProductsAddon::where('product_id', $product->id)->where('addon_product_status', 1)->pluck('related_product_id')->toArray();
                        @endphp
                        @foreach (filter_products(\App\Models\Product::whereIn('id', $related_product_ids)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)
                        <?php /*@foreach (filter_products(\App\Models\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)*/ ?>
                        <div class="swiper-slide" style="width: 600px;">
                            <div class="card" style="width: 18rem;height: 100%;">
                                {{-- <img class="card-img-top"
                                        src="https://uiocean.com/wrap/mombo/assets/img/feature/feature-15.jpg"
                                        alt="Card image cap"> --}}
                                <img class="card-img-top img-fit lazyload mx-auto h-140px h-md-210px" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($related_product->thumbnail_img) }}" alt="{{ $related_product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                <div class="card-body text-left">
                                    <h5 class="card-title font-weight-bolder" style="font-size: 1.2rem;">{{ $related_product->getTranslation('name') }}</h5>
                                    <p style="font-size: 1rem;">Dummy Text</p>
                                    {{-- <p class="card-text">Message</p> --}}
                                    <span style="color:#f7a616;"> {{ renderStarRating($related_product->rating) }}</span>
                                    <p class="two-11 mb-0 mt-3" style="display: flex; justify-content: center;">
                                        @if(home_base_price($related_product) != home_discounted_base_price($related_product))
                                        <small class="two-str" style="text-decoration: line-through; width:auto; margin-right:5px;font-size:1rem;">{{home_base_price($related_product)}}</small>
                                        @endif

                                        <strong style="font-size: 1.2rem;">{{ home_discounted_base_price($related_product) }}</strong>
                                    </p>
                                    <p style="display: flex;">
                                        <img src="https://www.beautyplayers.com/public/uploads/all/RYspA4IVDo4a3k700tzDTfX3qcnau5I4FUjiNqqb.png" style="width: 25px;height: 25px;" alt="">
                                        <!-- <i class="fa-solid fa-clock"></i>  -->
                                        {{ $related_product->getTranslation('unit') }} mins
                                    </p>
                                    <a href="#" onclick="directAddToCart(<?= $related_product->id ?>)" class="btn btn-success w-100">Book Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </div>
        @php
        $totalRatings = count($product->reviews);
        $excelent = 0;
        $good = 0;
        $average = 0;
        $poor = 0;
        $worst = 0;

        foreach($product->reviews as $review)
        {
        if($review->rating == 1){
        $worst++;
        }
        else if($review->rating == 2){
        $poor++;
        }
        else if($review->rating == 3){
        $average++;
        }
        else if($review->rating == 4){
        $good++;
        }
        else{
        $excelent++;
        }
        }

        if($totalRatings)
        {
        $excelent = (($excelent/$totalRatings) * 100);
        $good = (($good/$totalRatings) * 100);
        $average = (($average/$totalRatings) * 100);
        $poor = (($poor/$totalRatings) * 100);
        $worst = (($worst/$totalRatings) * 100);
        }
        @endphp
        <div class="row">
            <h4 class="m-4" style="font-weight: 600;">Ratings and Reviews</h4>
            <div class="col-12">
                <div class="row">
                    <span>
                        <h3 class="mx-4" style="font-weight: 700;font-size: 3rem;">{{$product->averageRating()}}</h3>
                    </span>
                    <span>
                        <div class="row">
                            <div class="col-12 mt-2">
                                @for ($i=0; $i < $product->averageRating(); $i++)
                                    <i class="fa-solid fa-star" style="color: #f7a616;"></i>
                                    @endfor
                                    @for ($i=0; $i < 5-$product->averageRating(); $i++)
                                        <i class="fa-solid fa-star" style="color: #e2e2e2;"></i>
                                        @endfor
                            </div>
                            <div class="col-12">
                                <h6>{{$product->averageRating()}} out of 5 stars</h6>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="row mb-3">
                    <div class="col-12">

                        @if($excelent)
                        <div class="row w-100">
                            <div class="col-md-2">Excellent</div>
                            <div class="col-md-8">
                                <hr style="width:{{$excelent}}%;float:left;background-color:#f7a616;height:5px !important;">
                            </div>
                            <div class="col-md-2">{{$excelent}}%</div>
                        </div>
                        @else
                        <div class="row w-100">
                            <div class="col-md-2">Excellent</div>
                            <div class="col-md-8">
                                <hr style="background-color: #eee;height:5px !important;">
                            </div>
                            <div class="col-md-2">0%</div>
                        </div>
                        @endif

                        @if($good)
                        <div class="row w-100">
                            <div class="col-md-2">Good</div>
                            <div class="col-md-8">
                                <hr style="width:{{$good}}%;float:left;background-color:#f7a616;height:5px !important;">
                            </div>
                            <div class="col-md-2">{{$good}}%</div>
                        </div>
                        @else
                        <div class="row w-100">
                            <div class="col-md-2">Good</div>
                            <div class="col-md-8">
                                <hr style="background-color: #eee;height:5px !important;">
                            </div>
                            <div class="col-md-2">0%</div>
                        </div>
                        @endif


                        @if($average)
                        <div class="row w-100">
                            <div class="col-md-2">Average</div>
                            <div class="col-md-8">
                                <hr style="width:{{$average}}%;float:left;background-color:#f7a616;height:5px !important;">
                            </div>
                            <div class="col-md-2">{{$average}}%</div>
                        </div>
                        @else
                        <div class="row w-100">
                            <div class="col-md-2">Average</div>
                            <div class="col-md-8">
                                <hr style="background-color: #eee;height:5px !important;">
                            </div>
                            <div class="col-md-2">0%</div>
                        </div>
                        @endif


                        @if($poor)
                        <div class="row w-100">
                            <div class="col-md-2">Poor</div>
                            <div class="col-md-8">
                                <hr style="width:{{$poor}}%;float:left;background-color:#f7a616;height:5px !important;">
                            </div>
                            <div class="col-md-2">{{$poor}}%</div>
                        </div>
                        @else
                        <div class="row w-100">
                            <div class="col-md-2">Poor</div>
                            <div class="col-md-8">
                                <hr style="background-color: #eee;height:5px !important;">
                            </div>
                            <div class="col-md-2">0%</div>
                        </div>
                        @endif


                        @if($worst)
                        <div class="row w-100">
                            <div class="col-md-2">Worst</div>
                            <div class="col-md-8">
                                <hr style="width:{{$worst}}%;float:left;background-color:#f7a616;height:5px !important;">
                            </div>
                            <div class="col-md-2">{{$worst}}%</div>
                        </div>
                        @else
                        <div class="row w-100">
                            <div class="col-md-2">Worst</div>
                            <div class="col-md-8">
                                <hr style="background-color: #eee;height:5px !important;">
                            </div>
                            <div class="col-md-2">0%</div>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                @foreach ($product->reviews as $key => $review)
                                @if($review->user != null)
                                <li class="media list-group-item d-flex">
                                    <span class="avatar avatar-md mr-3">
                                        <img class="lazyload" src="{{ static_asset('assets/img/placeholder.jpg') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" @if($review->user->avatar_original !=null)
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

                            @if(count($product->reviews) <= 0) <div class="text-center fs-18 opacity-70">
                                {{ translate('There have been no reviews for this product yet.') }}
                        </div>
                        @endif
                        {{-- <div class="col-md-2">
                                    <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeLarge prof css-6flbmm"
                                        focusable="false" aria-hidden="true" viewBox="0 0 24 24"
                                        data-testid="AccountCircleIcon" style="width: 50px; height: 50px;">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="m-0 p-0">Atul Kumar Jain</h6>
                                        </div>
                                        <div class="col-12">
                                            <p class="m-0 p-0">Monday, May 9, 2022</p>
                                        </div>
                                        <div class="col-12">
                                            <p class="m-0 p-0">Khushboo Is very professional and provided very hygienic
                                                and satisfying
                                                service. Thanks. Mrs Devina Jain
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <i class="fa-solid fa-star" style="color: green;"></i>
                                    <i class="fa-solid fa-star" style="color: green;"></i>
                                    <i class="fa-solid fa-star" style="color: green;"></i>
                                    <i class="fa-solid fa-star" style="color: green;"></i>
                                    <i class="fa-solid fa-star" style="color: green;"></i>
                                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="overflow: auto;">
        <h4 class="m-4" style="font-weight: 600; word-break: break-all !important;">Frequently Asked Questions
        </h4>
        <div class="col-md-12">
            <div id="accordion">
                <div class="card">
                    <div class="faq-card-header" id="headingOne">
                        <h5 class="mb-0">
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="title">What are the requirements for hair color that I need to be prepared
                                        with?</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-link collapsed" style="text-decoration:none ; color:#000;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="display: flex;justify-content: center;align-items: center;">
                                        <p style="font-weight: 900;font-size: 2rem;margin: 0;">
                                            +</p>
                                    </button>
                                </div>
                            </div>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad
                            squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                            nulla
                            assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                            sustainable
                            VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="faq-card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="title">How your service is hygienic?</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-link collapsed" style="text-decoration:none; color:#000;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <p style="font-weight: 900;font-size: 2rem;margin: 0;">
                                            +</p>
                                    </button>
                                </div>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad
                            squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                            nulla
                            assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                            sustainable
                            VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="faq-card-header" id="headingThree">
                        <h5 class="mb-0">
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="title">Do I need to give my products during service?</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-link collapsed" style="text-decoration:none; color:#000;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <p style="font-weight: 900;font-size: 2rem;margin: 0;">
                                            +</p>
                                    </button>
                                </div>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad
                            squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                            nulla
                            assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                            sustainable
                            VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $('#option-choice-form input').on('change', function() {
        getVariantPrice();
    });
</script>
<!-- Swiper JS -->

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".card-slider", {
        slidesPerView: 2,
        hashNavigation: {
            watchState: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            "@0.00": {
                slidesPerView: 1,
                // spaceBetween: 10,
            },
            "@0.75": {
                slidesPerView: 1,
                // spaceBetween: 20,
            },
            "@1.00": {
                slidesPerView: 1,
                // spaceBetween: 40,
            },
            "@1.50": {
                slidesPerView: 3,
                spaceBetween: 5,
            },
        },
    });
</script>
{{-- </body>

</html> --}}