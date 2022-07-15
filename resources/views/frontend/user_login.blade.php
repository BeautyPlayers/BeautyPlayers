@extends('frontend.layouts.app')



@section('content')



    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->

    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->



    <section class="gry-bg py-5">

        <div class="profile">

            <div class="container">

                <div class="row">

                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">

                        <div class="card">

                            <div class="text-center pt-4">

                                <h1 class="h4 fw-600">

                                    {{ translate('Login to your account.')}}

                                </h1>

                            </div>



                            <div class="px-4 py-3 py-lg-4">

                                <div class="">

                                    <form class="form-default" role="form" action="{{ route('login') }}" method="POST">

                                        @csrf

                                        @if (addon_is_activated('otp_system') && env("DEMO_MODE") != "On")

                                            <div class="form-group phone-form-group mb-1">

                                                <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">

                                            </div>



                                            <input type="hidden" name="country_code" value="">



                                            <div class="form-group email-form-group mb-1 d-none">

                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">

                                                @if ($errors->has('email'))

                                                    <span class="invalid-feedback" role="alert">

                                                        <strong>{{ $errors->first('email') }}</strong>

                                                    </span>

                                                @endif

                                            </div>



                                            <div class="form-group text-right">

                                                <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>

                                            </div>

                                        @else

                                            <div class="form-group">

                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">

                                                @if ($errors->has('email'))

                                                    <span class="invalid-feedback" role="alert">

                                                        <strong>{{ $errors->first('email') }}</strong>

                                                    </span>

                                                @endif

                                            </div>

                                        @endif



                                        <div class="form-group">

                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">

                                        </div>



                                        <div class="row mb-2">

                                            <div class="col-6">

                                                <label class="aiz-checkbox">

                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <span class=opacity-60>{{  translate('Remember Me') }}</span>

                                                    <span class="aiz-square-check"></span>

                                                </label>

                                            </div>

                                            <div class="col-6 text-right">

                                                <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>

                                            </div>

                                        </div>



                                        <div class="mb-5">

                                            <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>

                                        </div>

                                    </form>



                                    @if (env("DEMO_MODE") == "On")

                                        <div class="mb-5">

                                            <table class="table table-bordered mb-0">

                                                <tbody>

                                                    <tr>

                                                        <td>{{ translate('Seller Account')}}</td>

                                                        <td>

                                                            <button class="btn btn-info btn-sm" onclick="autoFillSeller()">{{ translate('Copy credentials') }}</button>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>{{ translate('Customer Account')}}</td>

                                                        <td>

                                                            <button class="btn btn-info btn-sm" onclick="autoFillCustomer()">{{ translate('Copy credentials') }}</button>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>{{ translate('Delivery Boy Account')}}</td>

                                                        <td>

                                                            <button class="btn btn-info btn-sm" onclick="autoFillDeliveryBoy()">{{ translate('Copy credentials') }}</button>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                    @endif



                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)

                                        <div class="separator mb-3">

                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>

                                        </div>

                                        <ul class="list-inline social colored text-center mb-5">

                                            @if (get_setting('facebook_login') == 1)

                                                <li class="list-inline-item">

                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">

                                                        <i class="lab la-facebook-f"></i>

                                                    </a>

                                                </li>

                                            @endif

                                            @if(get_setting('google_login') == 1)

                                                <li class="list-inline-item">

                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">

                                                        <i class="lab la-google"></i>

                                                    </a>

                                                </li>

                                            @endif

                                            @if (get_setting('twitter_login') == 1)

                                                <li class="list-inline-item">

                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">

                                                        <i class="lab la-twitter"></i>

                                                    </a>

                                                </li>

                                            @endif

                                            

                                            <li class="list-inline-item">

                                                <a onclick="show_whatsapp_modal()" style="background-color: #25D366; cursor: pointer">

                                                    <i class="lab la-whatsapp"></i>

                                                </a>

                                            </li>

                                        </ul>

                                    @endif

                                </div>

                                <div class="text-center">

                                    <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>

                                    <a href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    

    <div class="modal fade" id="whatsapp_login_modal">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

    <div class="modal-header">

      <h5 class="modal-title h6">{{ translate('Enter your registered phone number')}}</h5>

      <button type="button" class="close" data-dismiss="modal">

      </button>

    </div>

    <div class="modal-body" style="max-height: 100%;height: auto;overflow: unset;">

            <div id="wa_box">

                <input type="tel" id="phone-code-whatsapp" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">

                <input type="hidden" name="country_code_whatsapp" value="">                

            </div>

            <div id="otp_box">

                <input type="text" id="otp_code" placeholder="Enter the OTP you received on whatsapp." class="form-control"> 

            </div>



    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>

      <a href="#" id="whatsapp_login" class="btn btn-primary">{{ translate('Send OTP') }}</a>

      <a href="#" id="whatsapp_otp_submit" class="btn btn-primary">{{ translate('Submit OTP') }}</a>

    </div>

  </div>

  </div>

</div>

@endsection



@section('script')

    <script type="text/javascript">

        var country_code = null;

        var phone_number = null;

        $(function(){

            $('#otp_box').hide();

            $('#whatsapp_otp_submit').hide();



            $('#whatsapp_login').on('click', function(){

                country_code = $('input[name=country_code_whatsapp]').val();

                phone_number = $('#phone-code-whatsapp').val();

                $.post('{{ route('social.whatsapp') }}',{_token:$('meta[name="csrf-token"]').attr('content'), country_code: country_code, phone_number: phone_number}, function(data){

                    // $('#affiliate_withdraw_modal #modal-content').html(data);

                    // $('#affiliate_withdraw_modal').modal('show', {backdrop: 'static'});

                    // AIZ.plugins.bootstrapSelect('refresh');

                    

                    $('#wa_box').hide();

                    $('#whatsapp_login').hide();

                    $('#otp_box').show();

                    $('#whatsapp_otp_submit').show();

                });

            })

            

            $('#whatsapp_otp_submit').on('click', function(){

                var otp_code = $('#otp_code').val();

                $.post('{{ route('otp.verify') }}',{_token:$('meta[name="csrf-token"]').attr('content'),country_code:country_code,phone_number:phone_number,otp:otp_code}, function(data){

                    if(data.status == 'success'){

                        location.reload();

                    } else {

                        AIZ.plugins.notify('danger', "{{ translate('incorrect otp') }}");

                    }

                });

            })

            

        

        })

    

        function show_whatsapp_modal(){

            $('#whatsapp_login_modal').modal('show');

            // document.getElementById('reject_link').setAttribute('href' , reject_link);

        }

        

        var isPhoneShown = true,

            countryData = window.intlTelInputGlobals.getCountryData(),

            input = document.querySelector("#phone-code");



        for (var i = 0; i < countryData.length; i++) {

            var country = countryData[i];

            if(country.iso2 == 'bd'){

                country.dialCode = '88';

            }

        }



        var iti = intlTelInput(input, {

            separateDialCode: true,

            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",

            onlyCountries: @php echo json_encode(\App\Models\Country::where('id', 101)->pluck('code')->toArray()) @endphp,

            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {

                if(selectedCountryData.iso2 == 'bd'){

                    return "01xxxxxxxxx";

                }

                return selectedCountryPlaceholder;

            }

        });



        var country = iti.getSelectedCountryData();

        $('input[name=country_code]').val(country.dialCode);



        input.addEventListener("countrychange", function(e) {

            // var currentMask = e.currentTarget.placeholder;



            var country = iti.getSelectedCountryData();

            $('input[name=country_code]').val(country.dialCode);



        });

        

        

        

        

        

        

        

        var isPhoneShown = true,

            countryData = window.intlTelInputGlobals.getCountryData(),

            input = document.querySelector("#phone-code-whatsapp");



        for (var i = 0; i < countryData.length; i++) {

            var country = countryData[i];

            if(country.iso2 == 'bd'){

                country.dialCode = '88';

            }

        }



        var iti = intlTelInput(input, {

            separateDialCode: true,

            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",

            onlyCountries: @php echo json_encode(\App\Models\Country::where('id', 101)->pluck('code')->toArray()) @endphp,

            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {

                if(selectedCountryData.iso2 == 'bd'){

                    return "01xxxxxxxxx";

                }

                return selectedCountryPlaceholder;

            }

        });



        var country = iti.getSelectedCountryData();

        $('input[name=country_code]').val(country.dialCode);



        input.addEventListener("countrychange", function(e) {

            // var currentMask = e.currentTarget.placeholder;



            var country = iti.getSelectedCountryData();

            $('input[name=country_code_whatsapp]').val(country.dialCode);



        });



 function toggleEmailPhone(el){

            if(isPhoneShown){

                $('.phone-form-group').addClass('d-none');

                $('.email-form-group').removeClass('d-none');

                $('input[name=phone]').val(null);

                isPhoneShown = false;

                $(el).html("{{ translate('Use Phone Instead') }}");

            }

            else{

                $('.phone-form-group').removeClass('d-none');

                $('.email-form-group').addClass('d-none');

                $('input[name=email]').val(null);

                isPhoneShown = true;

                $(el).html("{{ translate('Use Email Instead') }}");

            }

        }







        function autoFillSeller(){

            $('#email').val('seller@example.com');

            $('#password').val('123456');

        }

        function autoFillCustomer(){

            $('#email').val('customer@example.com');

            $('#password').val('123456');

        }

        function autoFillDeliveryBoy(){

            $('#email').val('deliveryboy@example.com');

            $('#password').val('123456');

        }

    </script>

@endsection

