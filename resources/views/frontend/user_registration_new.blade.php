@extends('frontend.layouts.app')

@section('header-styles')
    <!-- Fontawesome CSS -->
    {{-- <script src="https://kit.fontawesome.com/9b6c6cb0f0.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="{{ static_asset('css/frontend/customer_register.css') }}">    
@endsection


@section('content')

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8 offset-md-2">
                    
                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Customer Register <a href="doctor-register.html">Are you a Doctor?</a></h3>
                            </div>
                            
                            <!-- Customer Register Form -->
                            <form id="reg-form" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Full Name') }}" name="name">
                                    <label class="focus-label">Name</label>
                                </div>
                                
                                @if (addon_is_activated('otp_system'))
                                    <div class="form-group form-focus">
                                        <input type="tel" id="phone-code" class="form-control floating{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                        <label class="focus-label focus-label-phone">Mobile Number</label>
                                    </div>

                                    <input type="hidden" name="country_code" value="">

                                    <div class="form-group email-form-group form-focus">
                                        <input type="email" class="form-control floating{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label class="focus-label focus-label-phone">Email Address</label>
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                    </div>
                                @else
                                    <div class="form-group form-focus">
                                        <input type="email" class="form-control floating{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label class="focus-label focus-label-phone">Mobile Number</label>
                                    </div>
                                @endif

                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating">
                                    <label class="focus-label">Create Password</label>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating">
                                    <label class="focus-label">Confirm Password</label>
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="login.html">Already have an account?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                    </div>
                                </div>
                            </form>
                            <!-- /Register Form -->
                            
                        </div>
                    </div>
                </div>
                <!-- /Register Content -->
                    
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->

@endsection


@section('script')
    @if(get_setting('google_recaptcha') == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">

        @if(get_setting('google_recaptcha') == 1)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        @endif

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

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection
