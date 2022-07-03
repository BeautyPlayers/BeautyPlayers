@extends('seller.layouts.app')

@section('panel_content')

    <div class="aiz-titlebar mt-2 mb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Shop Settings')}}
                <a href="{{ route('shop.visit', $shop->slug) }}" class="btn btn-link btn-sm" target="_blank">({{ translate('Visit Shop')}})<i class="la la-external-link"></i>)</a>
            </h1>
        </div>
      </div>
    </div>

    {{-- Basic Info --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Basic Info') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('seller.shop.update') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                @csrf
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Name') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Shop Name')}}" name="name" value="{{ $shop->name }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Logo') }}</label>
                    <div class="col-md-10">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="logo" value="{{ $shop->logo }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">
                        {{ translate('Shop Phone') }}
                    </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Phone')}}" name="phone" value="{{ $shop->phone }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Address') }} <span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Address')}}" name="address" value="{{ $shop->address }}" required>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Live Location') }} <span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input id="live_location" type="text" class="form-control mb-3" placeholder="{{ translate('Live Location (Please allow location on device)')}}" name="address" value="{{ $shop->live_location }}">
                    </div>
                </div>
                @if (get_setting('shipping_type') == 'seller_wise_shipping')
                    <div class="row">
                        <div class="col-md-2">
                            <label>{{ translate('Shipping Cost')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" lang="en" min="0" class="form-control mb-3" placeholder="{{ translate('Shipping Cost')}}" name="shipping_cost" value="{{ $shop->shipping_cost }}" required>
                        </div>
                    </div>
                @endif
                
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
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Enter Custom Location') }}</h5>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('seller.shop.update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    @csrf

                        <div class="row mb-3">
                            <input id="searchMap" class="form-control mb-3" type="text" placeholder="{{translate('Enter a location')}}">
                            <br>
                            <div style="margin-top:40px;display: none;" id="map"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Longitude') }}</label>
                            </div>
                            <div class="col-md-10" id="">
                                <input type="text" class="form-control mb-3" id="lng" name="delivery_pickup_longitude"  value="{{ $shop->delivery_pickup_longitude }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Latitude') }}</label>
                            </div>
                            <div class="col-md-10" id="">
                                <input
                                 type="text" class="form-control mb-3" id="lat" name="delivery_pickup_latitude"  value="{{ $shop->delivery_pickup_latitude }}">
                            </div>
                        </div>


                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>

    @if (addon_is_activated('delivery_boy'))
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('Delivery Boy Pickup Point') }}</h5>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('seller.shop.update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    @csrf

                    @if (get_setting('google_map') == 1)
                        <div class="row mb-3">
                            <input id="searchInput" class="controls" type="text" placeholder="{{translate('Enter a location')}}">
                            <div style="margin-top:40px; height:250px; width:600px;" id="map"></div>
                            <ul id="geoData">
                                <li style="display: none;">{{ translate('Full Address') }}: <span id="location"></span></li>
                                <li style="display: none;">{{ translate('Postal Code') }}: <span id="postal_code"></span></li>
                                <li style="display: none;">{{ translate('Country') }}: <span id="country"></span></li>
                                <li style="display: none;">{{ translate('Latitude') }}: <span id="lat"></span></li>
                                <li style="display: none;">{{ translate('Longitude') }}: <span id="lon"></span></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Longitude') }}</label>
                            </div>
                            <div class="col-md-10" id="">
                                <input type="text" class="form-control mb-3" id="longitude" name="delivery_pickup_longitude" readonly="" value="{{ $shop->delivery_pickup_longitude }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Latitude') }}</label>
                            </div>
                            <div class="col-md-10" id="">
                                <input id="lat_value" type="text" class="form-control mb-3" id="latitude" name="delivery_pickup_latitude" readonly="" value="{{ $shop->delivery_pickup_latitude }}">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Longitude') }}</label>
                            </div>
                            <div class="col-md-10" id="">
                                <input type="text" class="form-control mb-3" id="longitude" name="delivery_pickup_longitude" value="{{ $shop->delivery_pickup_longitude }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2" id="">
                                <label for="exampleInputuname">{{ translate('Latitude') }}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" id="lat_value" name="delivery_pickup_latitude" value="{{ $shop->delivery_pickup_latitude }}">
                            </div>
                        </div>
                    @endif

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Banner Settings --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Banner Settings') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('seller.shop.update') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                @csrf

                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">{{ translate('Banners') }} (1500x450)</label>
                    <div class="col-md-10">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="sliders" value="{{ $shop->sliders }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                        <small class="text-muted">{{ translate('We had to limit height to maintian consistancy. In some device both side of the banner might be cropped for height limitation.') }}</small>
                    </div>
                </div>

                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Social Media Link --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Social Media Link') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{ route('seller.shop.update') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                @csrf
                <div class="form-box-content p-3">
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">{{ translate('Facebook') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ translate('Facebook')}}" name="facebook" value="{{ $shop->facebook }}">
                            <small class="text-muted">{{ translate('Insert link with https ') }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">{{ translate('Instagram') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ translate('Instagram')}}" name="instagram" value="{{ $shop->instagram }}">
                            <small class="text-muted">{{ translate('Insert link with https ') }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">{{ translate('Twitter') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ translate('Twitter')}}" name="twitter" value="{{ $shop->twitter }}">
                            <small class="text-muted">{{ translate('Insert link with https ') }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">{{ translate('Google') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ translate('Google')}}" name="google" value="{{ $shop->google }}">
                            <small class="text-muted">{{ translate('Insert link with https ') }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">{{ translate('Youtube') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ translate('Youtube')}}" name="youtube" value="{{ $shop->youtube }}">
                            <small class="text-muted">{{ translate('Insert link with https ') }}</small>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
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
