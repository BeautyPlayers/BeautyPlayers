<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDpgVwmJo0oG5ZfGKnkdiDCy75ELgptvC8&ver=3.exp"></script>

<script>

    // $(document).ready(function(){
        function detect_current_location(param){
            if(param.value == 'detect'){
                navigator.geolocation.getCurrentPosition(
                    function( position ){ // success cb
                        console.log( position );
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;
                        var google_map_position = new google.maps.LatLng( lat, lng );
                        var google_maps_geocoder = new google.maps.Geocoder();
                        google_maps_geocoder.geocode(
                            { 'latLng': google_map_position },
                            function( results, status ) {
                                var complete_address = results[0].formatted_address;
                                
                                console.log('results', results)
                                get_chunks_from_address(results);
                                var option = "<option value='"+complete_address+"'>"+complete_address+"</option>";
                                console.log(option)
                                $('.select_location').append(option);
                                // var last_option = $('.select_location option:last').val();
                                // console.log(last_option)
                                $('.location-form input').val(complete_address);
                                $('.select_location').val(last_option);
                            }
                        );
                    },
                    function(){ // fail cb
                        alert('failed to detect the current location')
                    }
                );        
            }
            
        }
        
        
    // })
    
    function get_chunks_from_address(addresses){
        var country = "";
        var city = "";
        var address = addresses[0].formatted_address;
        $("#addres_live").val(address)
        $('#live_location').val(address)
        addresses.forEach((val, index) => {
            if(val.types.includes('country')){
                country = val.formatted_address;                
            }
            if(val.types.includes('administrative_area_level_2')){
                city = val.address_components[0].long_name;
            }
        })
        
        console.log('country', country);
        console.log('city', city);
        console.log('address', address);
    }
    
    
    $(document).ready(function(){
        let detect = {value:"detect"};
    detect_current_location(detect)
})
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light"
        style="background-color: #fff !important;box-shadow: 1px 1px 6px #cbcbcb;; height: 100px !important;z-index:999;">
        <a class="navbar-brand mx-3" href="{{ route('home') }}">
            <img src="https://www.beautyplayers.com/public/uploads/all/BccpSvTQNP9tyqglx5bhqqzUXMUt9R6A09QoqxGe.png"
                alt="" style="width: 125px;height: 40px;">
        </a>
        <span class="nav-item search-span-1">
            <a class="nav-link font-weight-bold text-dark my-1" href="#" id="search-icon-1">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <span class="mx-2 toggler-button">
                <label class="font-weight-bold text-dark">Book</label>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider-switch round"></span>
                </label>
                <label class="font-weight-bold text-dark">Reseller</label>
            </span>
            <form class="form-inline my-2 my-lg-0 m-auto location-form">
                <input class="form-control mr-sm-2 location-bar px-4" type="text"
                    placeholder="Tap on it to pick you location..." aria-label="Search">
            </form>
            <ul class="navbar-nav">
                <li class="nav-item {{ Route::current()->getName() == 'services' ? 'pt-3' : 'px-1' }}">
                    <a class="nav-link text-dark" href="{{route('nearby.sellers')}}">
                        <img src="{{static_asset('assets/img/nearby.png')}}" alt="Beauty Players">
                        Nearby Experts
                    </a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link text-dark" href="{{ route('coupons.all') }}">
                        <img src="{{static_asset('assets/img/coupon.png')}}" alt="">
                        Coupons
                    </a>
                </li>
                @if(Auth::check())
                <li class="nav-item px-1">
                    <a class="nav-link profile-link text-dark" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-user"></i>
                        My Profile
                    </a>
                </li>
                @else
                <li class="nav-item px-1">
                    <a class="nav-link text-dark" href="{{ route('user.login') }}">
                        <img src="{{static_asset('assets/img/signin.png')}}" alt="">
                        Login
                    </a>
                </li>
                @endif
                <li class="nav-item px-1" id="cart_items">
                    {{-- <a class="nav-link text-dark" href="#">
                        <img src="{{static_asset('assets/img/cart.png')}}" alt="">
                        Cart
                    </a> --}}
                    @include('frontend.partials.cart')
                </li>
                <li class="nav-item px-2 search-span">
                    <a class="nav-link font-weight-bold text-dark my-2" href="#" id="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="mx-5 my-4" id="search-bar">
        <form class="form-inline my-2 my-lg-0 m-auto">
            <input id="search" class="form-control mr-sm-2 search-bar w-100 px-4" type="search" placeholder="Search Here..."
                aria-label="Search">
        </form>
    </div>
    <div class="search-result-container">
        <div id="search-content" class="text-left">
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>
        $('#search-bar').hide();
        $('#search-icon, #search-icon-1').click(function () {
            $('#search-bar').toggle();
            $('#search-content').html(null);
        });
    </script>