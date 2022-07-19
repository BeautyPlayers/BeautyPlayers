@extends('frontend.layouts.app')

@section('header-styles')
  <!-- Plugin CSS -->
  <link href="static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/et-line@1.0.1/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
  <link href="{{ static_asset('static/plugin/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ static_asset('static/plugin/magnific/magnific-popup.css') }}" rel="stylesheet">
  <!-- End -->
    <link rel="stylesheet" href="{{ static_asset('css/frontend/reseller_page.css') }}">
@endsection

	@section('content')	
<style>	
  @media only screen and (max-width: 600px) {	
    .tab-style-1 .nav-link span {	
      display: block;	
    }	
    .tab-style-1 .nav-item {	
      border: 1px dashed rgba(255, 255, 255, 0.5);	
    }	
  }	
</style>	
<!-- Modal -->
<div class="modal fade" id="affiliateModal" tabindex="-1" role="dialog" aria-labelledby="affiliateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="affiliateModalLabel">Affiliate Informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
              <form class="" action="{{ route('affiliate.store_affiliate_user') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if (!Auth::check())
                      <div class="card">
                          <div class="card-header">
                              <h5 class="mb-0 h6">{{translate('User Info')}}</h5>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <div class="input-group input-group--style-1">
                                              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ translate('Name') }}" name="name">
                                              <span class="input-group-addon">
                                                  <i class="las la-user"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <div class="input-group input-group--style-1">
                                              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email') }}" name="email">
                                              <span class="input-group-addon">
                                                  <i class="las la-envelope"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <div class="input-group input-group--style-1">
                                              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password') }}" name="password">
                                              <span class="input-group-addon">
                                                  <i class="las la-lock"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <div class="input-group input-group--style-1">
                                              <input type="password" class="form-control" placeholder="{{ translate('Confirm Password') }}" name="password_confirmation">
                                              <span class="input-group-addon">
                                                  <i class=" las la-lock"></i>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endif
                  <div class="card">
                      <div class="card-header">
                          <h5 class="mb-0 h6">{{translate('Verification info')}}</h5>
                      </div>
                      <div class="card-body">
                          @php
                              $verification_form = \App\Models\AffiliateConfig::where('type', 'verification_form')->first()->value;
                          @endphp
                              @foreach (json_decode($verification_form) as $key => $element)
                                  @if ($element->type == 'text')
                                      <div class="row">
                                          <label class="col-md-2 col-form-label">{{ $element->label }} <span class="text-danger">*</span></label>
                                          <div class="col-md-10">
                                              <input type="{{ $element->type }}" class="form-control mb-3" placeholder="{{ $element->label }}" name="element_{{ $key }}" required>
                                          </div>
                                      </div>
                                  @elseif($element->type == 'file')
                                      <div class="row">
                                          <label class="col-md-2 col-form-label">{{ $element->label }}</label>
                                          <div class="col-md-10">
                                              <input type="{{ $element->type }}" name="element_{{ $key }}" id="file-{{ $key }}" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" required/>
                                              <label for="file-{{ $key }}" class="mw-100 mb-3">
                                                  <span></span>
                                                  <strong>
                                                      <i class="fa fa-upload"></i>
                                                      {{translate('Choose file')}}
                                                  </strong>
                                              </label>
                                          </div>
                                      </div>
                                  @elseif ($element->type == 'select' && is_array(json_decode($element->options)))
                                      <div class="row">
                                          <label class="col-md-2 col-form-label">{{ $element->label }}</label>
                                          <div class="col-md-10">
                                              <div class="mb-3">
                                                  <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_{{ $key }}" required>
                                                      @foreach (json_decode($element->options) as $value)
                                                          <option value="{{ $value }}">{{ $value }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  @elseif ($element->type == 'multi_select' && is_array(json_decode($element->options)))
                                      <div class="row">
                                          <label class="col-md-2 col-form-label">{{ $element->label }}</label>
                                          <div class="col-md-10">
                                              <div class="mb-3">
                                                  <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_{{ $key }}[]" multiple required>
                                                      @foreach (json_decode($element->options) as $value)
                                                          <option value="{{ $value }}">{{ $value }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  @elseif ($element->type == 'radio')
                                      <div class="row">
                                          <label class="col-md-2 col-form-label">{{ $element->label }}</label>
                                          <div class="col-md-10">
                                              <div class="mb-3">
                                                  @foreach (json_decode($element->options) as $value)
                                                      <div class="radio radio-inline">
                                                          <input type="radio" name="element_{{ $key }}" value="{{ $value }}" id="{{ $value }}" required>
                                                          <label for="{{ $value }}">{{ $value }}</label>
                                                      </div>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>
                                  @endif
                              @endforeach
                      </div>
                  </div>
                  <div class="form-group mb-0 text-right">
                      <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                  </div>
              </form>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>

<!--
    ======================
    Loading
    ======================
  -->
  {{-- <div id="loading" class="theme-bg">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div> --}}
  <!-- / -->

  <!--
  ======================
  Header
  ======================
  -->
  {{-- <header>
    <nav class="navbar header-nav  navbar-expand-lg">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img class="light-logo" src="static/img/logo-light.svg" title="" alt="">
          <img class="dark-logo" src="static/img/logo.svg" title="" alt="">
        </a>
        <!-- / -->

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
          aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <!-- / -->

        <!-- Top Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
          <ul class="navbar-nav m-auto align-items-lg-center justify-content-lg-center">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#feature">Features</a></li>
            <li><a class="nav-link" href="#team">Team</a></li>
            <li><a class="nav-link" href="#price">Pricing</a></li>
            <li><a class="nav-link" href="#blog">Our Blog</a></li>
            <li><a class="nav-link" href="#contatus">Contact</a></li>

          </ul>
          <ul class="navbar-nav align-items-lg-center d-none d-lg-block">
            <li class="nav-btn-link"><a class="m-btn m-btn-t-white" href="#">Login</a></li>
          </ul>
        </div>
        <!-- / -->

      </div>
      <!-- Container -->
    </nav>
    <!-- Navbar -->
  </header> --}}


  <main>
    <!--
    ======================
    Home Banner
    ======================
    -->
    <section id="home" class="home-banner-01 banner-effect-section theme-bg">
      <div class="banner-effect">
        <div class="be dark-bg be-1"></div>
        <div class="be dark-bg be-2"></div>
        <div class="be dark-bg be-3"></div>
      </div>
      <!-- <div class="banner-effect-img"><img src="static/img/banner-round.svg" title="" alt=""></div> -->
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-9 text-center p-100px-t md-p-50px-t m-80px-t m-40px-b">
            <div class="banner-text">
              <label class="white-color">Bharat ka #1 Salon Reselling App</label>
              <h2 class="white-color font-alt">Kamaye ₹30,000 Mahina</h2>
              <p class="m-0px white-color">Share Salon Services at Home by Certified Beauty Experts</p>
            </div>
          </div>
          <!-- col -->
          <div class="col-md-12 text-center p-40px-b">
            <img src="{{static_asset('static/img/landing.png')}}" title="" alt="" class="img-responsive">
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>

    <!--
    ======================
    About us
    ======================
    -->
    <section id="feature" class="section" style="background: white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about-box p-20px-r md-p-0px-r">
              <label class="theme-color">Welcome to Beauty Players</label>
              <h3 class="font-alt dark-color">Online Reselling kaise karen?</h3>
              <p class="m-30px-b large-text" style="color:#000 !important; font-weight: 500;">Beauty Players ke saath
                bina investment kiye apna reselling
                business start
                kare. Aap apne najdeeki dosto or rishtedaro
                ko salon services share karke unka appointments book karwaye. har aapointment per paisa kamaye.
              </p>
              <hr>
              <ul class="list-style-1 m-0px p-0px p-15px-t">
                <li class="theme-after dark-color"><i class="ti-check theme-color"></i>Aapko aajadi hai apne hisab se
                  kaam karne ki</li>
                <li class="theme-after dark-color"><i class="ti-check theme-color"></i>Aap full time ya part time kaam
                  kar sakte hai</li>
                <li class="theme-after dark-color"><i class="ti-check theme-color"></i>Aap apne ghar se hi yeh kaam kar
                  sakte hai</li>
              </ul>
              <div class="btn-bar p-20px-t">
                <button type="button" class="m-btn m-btn-theme" href="#" data-toggle="modal" data-target="#affiliateModal">Get Started</button>
              </div>
            </div>
          </div>
          <div class="col-lg-6 md-p-40px-t text-center">
            <img src="{{ static_asset('static/img/online-reselling.png') }}" title="" alt="">
          </div>
        </div>
      </div>
      <!-- container -->
    </section>

    <!--
    ======================
    Services
    ======================
    -->
    <section class="section theme-bg banner-effect-section">
      <div class="banner-effect banner-effect-bottom">
        <div class="be dark-bg be-1"></div>
        <div class="be dark-bg be-2"></div>
        <div class="be dark-bg be-3"></div>
      </div>

      <div class="container">
        <div class="row justify-content-center m-45px-b sm-m-25px-b">
          <div class="col-md-10 col-lg-8 text-center">
            <div class="heading">
              <label class="white-color theme-after">Work From Home</label>
              <h2 class="white-color font-alt">Earn 30,000/- Month</h2>
              <p class="white-color">Beauty Players ke saath shuru kare apna online Reselling Business</p>
            </div>
          </div>
          <!-- col -->
        </div>
        <!-- row -->

        <div class="row">

          <div class="col-md-6 m-15px-tb">
            <div class="feature-box-06">
              <!-- <div class="icon">
                <i class="icon-layers theme-color"></i>
              </div> -->
              <div class="icon" style="width: 75px;height: 75px;">
                <img src="{{static_asset('static/img/mom.png')}}" class="img-responsive" alt="">
              </div>
              <div class="feature-content">
                <h4 class="theme-color">For Moms</h4>
                <p style="font-weight: 600;">Ghar or kaam ek saath sambhalna bilkul bhi aasan nhi hota.
                  lekin ek achcha jeevan jeene k liye kaam karna bhi jaruri hai
                  Beauty Players ke saath aap ek aesa business start karte hai
                  jaha Time or Work ko aap apne hisab se manage karte hue mahine ka 30,000 tak kama sakte hai. Or apne
                  bachcho or parivar
                  ko ek sunhera
                  Bhavishya de sakte hai.</p>
                <!-- <a class="theme-color" href="#">More Details</a> -->
              </div>
            </div>
          </div>
          <!-- col -->

          <div class="col-md-6 m-15px-tb">
            <div class="feature-box-06">
              <!-- <div class="icon">
                <i class="icon-scissors theme-color"></i>
              </div> -->
              <div class="icon" style="width: 75px;height: 75px;">
                <img src="{{ static_asset('static/img/womens.png') }}" class="img-responsive" alt="">
              </div>
              <div class="feature-content">
                <h4 class="theme-color">For Womens</h4>
                <p style="font-weight: 600;">Ab bharat ki sabhi ladies ghar bethe bas kuch hi ghante
                  kaam karte hue mahine ka ₹30,000 tak kama sakti hai. or wo bhi
                  bina kisi investment kiye. apne parivar me apni income jod kar apni
                  khud ki pehchan bana sakti hai. ghar me rehne wali ladies jo office
                  me daily reports nahi kar sakti, ghar se hi kaam karke apne bachcho ko ek behtar bhavishya de sakti
                  hai
                </p>
                <!-- <a class="theme-color" href="#">More Details</a> -->
              </div>
            </div>
          </div>
          <!-- col -->

          <div class="col-md-6 m-15px-tb">
            <div class="feature-box-06">
              <!-- <div class="icon">
                <i class="theme-color icon-tools-2"></i>
              </div> -->
              <div class="icon" style="width: 75px;height: 75px;">
                <img src="{{static_asset('static/img/student.png')}}" class="img-responsive" alt="">
              </div>
              <div class="feature-content">
                <h4 class="theme-color">For Students</h4>
                <p style="font-weight: 600;">As a college student ek part time job pocket money ke saath
                  saath, kuch
                  extra earning me bhi aapki
                  help kar sakti hai.
                  Part time work karne se aap bahut saari cheejo ko seekhte hai, Aapki personality or bhi develope hoti
                  hai, aapko cheejo
                  ki practical knowledge hoti hai, jo future me aapke kaam aa sakti hai</p>
                <!-- <a class="theme-color" href="#">More Details</a> -->
              </div>
            </div>
          </div>
          <!-- col -->

          <div class="col-md-6 m-15px-tb">
            <div class="feature-box-06">
              <!-- <div class="icon">
                <i class="icon-tools theme-color"></i>
              </div> -->
              <div class="icon" style="width: 75px;height: 75px;">
                <img src="{{ static_asset('static/img/businessman.png') }}" class="img-responsive" alt="">
              </div>
              <div class="feature-content">
                <h4 class="theme-color">Business without investment
                </h4>
                <p style="font-weight: 600;">Beauty Players Bharat ka #1 online Salon Reselling App hai. Jaha
                  aap ZERO
                  investment ke saath apna
                  online business ghar
                  se hi start karte hai, yaha aap khud k manager hai. yeh ek 100% Genuine work from home job hai. jaha
                  aap din me kuch hi
                  ghante kaam karke mahine ka 30,000 tak kamate hue apne sapne pure karte hai
                </p>
                <!-- <a class="theme-color" href="#">More Details</a> -->
              </div>
            </div>
          </div>
          <!-- col -->

        </div>
        <!-- row -->

      </div>
    </section>

    <!-- 
    =====================
    Features
    ===================== 
    -->
    <section class="section" style="background: white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-50px-r lg-p-0px-r">
              <div class="icon-box">
                <i class="theme-bg white-color icon-tools-2"></i>
              </div>
              <h3 class="side-title dark-color m-0px m-20px-b">Mai Beauty Players ke saath Reseller kaise ban
                sakta hu ?</h3>
              <ul class="list-style-1 m-0px p-0px">
                <li class="theme-after">
                  <i class="ti-check theme-color"></i><label class="dark-color">START RESELLING</label>
                  <p style="font-weight: 500; color: #000;">Beauty Players ke saath online reseller banne ke liye
                    aapko beauty players ki website per jana hoga.
                    or Reselling start karna hoga.</p>
                </li>
                <li class="theme-after">
                  <i class="ti-check theme-color"></i><label class="dark-color">ZERO FEES</label>
                  <p style="font-weight: 500; color: #000;">Beauty Players bharat me online reseller
                    banne ke liye koi subscription fees nahi leta hai
                  </p>
                </li>
                <li class="theme-after">
                  <i class="ti-check theme-color"></i><label class="dark-color">WORK FROM HOME</label>
                  <p style="font-weight: 500; color: #000;">Aap aaj hi apna Online business start kar sakte hai
                    or apne ghar se aaram se kaam karte hue mahine ka
                    ₹30,000 tak kama sakte hai
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <!-- col -->

          <div class="col-lg-6 md-p-40px-t">
            <img src="{{ static_asset('static/img/become-reseller.png') }}" title="" alt="">
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>



    <!-- 
    =====================
    Tab
    ===================== 
    -->
    <section class="section p-0px-t" style="background: white">
      <h3 class="text-center dark-color m-0px m-20px-b">How much would you like to earn in a month?</h3>
      <div class="tab-style-1">
        <div class="tab-style-nav theme-bg box-shadow">
          <div class="container">
            <ul class="nav nav-fill justify-content-center" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link theme-after active" id="pills-first-tab" data-toggle="pill" href="#pills-first"
                  role="tab" aria-controls="pills-first" aria-selected="false">
                  <span>&#x20B9; 2000/-</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link theme-after" id="pills-second-tab" data-toggle="pill" href="#pills-second" role="tab"
                  aria-controls="pills-second" aria-selected="true">
                  <span>&#x20B9; 5000/-</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link theme-after" id="pills-third-tab" data-toggle="pill" href="#pills-third" role="tab"
                  aria-controls="pills-third" aria-selected="false">
                  <span>&#x20B9; 10,000/-</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link theme-after" id="pills-fourth-tab" data-toggle="pill" href="#pills-fourth" role="tab"
                  aria-controls="pills-fourth" aria-selected="false">
                  <span>&#x20B9; 20,000/-</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link theme-after" id="pills-fifth-tab" data-toggle="pill" href="#pills-fifth" role="tab"
                  aria-controls="pills-fifth" aria-selected="false">
                  <span>&#x20B9; 30,000/-</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--  -->

        <div class="container">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-first" role="tabpanel" aria-labelledby="pills-first-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <img src="{{static_asset('static/img/2000.png')}}" title="" alt="">
                </div>
                <!-- col -->
                <div class="col-lg-6 md-m-30px-t">
                  <div class="card-box-01 p-50px-l  md-p-0px-l">
                    <label class="theme-color" style="font-weight: 500; color: #000;">Your Time Required</label>
                    <h3 class="font-alt dark-color">20 Minutes a Day</h3>
                    <p class="large-text" style="font-weight: 500; color: #000;">apne customers ki favorite services ko
                      share kare or kamaye
                      30,000 tak mahina. Pick. Share. Earn.</p>
                    <div class="row p-10px-t">
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Own Boss</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Work from Home</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Zero Investment</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>#1 Services Reselling</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Free Trainings</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Part Time Work</li>
                        </ul>
                      </div>
                    </div>
                    <div class="btn-bar">
                      <button class="m-btn m-btn-theme" data-toggle="modal" data-target="#affiliateModal" href="#">Get Start</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- row -->
            </div>
            <!-- tab content -->

            <div class="tab-pane fade" id="pills-second" role="tabpanel" aria-labelledby="pills-second-tab">
              <div class="row align-items-center">
                <div class="col-lg-6 md-m-30px-t">
                  <div class="card-box-01 p-50px-l  md-p-0px-l">
                    <label class="theme-color" style="font-weight: 500; color: #000;">Your Time Required</label>
                    <h3 class="font-alt dark-color">30 Minutes a Day</h3>
                    <p class="large-text" style="font-weight: 500; color: #000;">apne customers ki favorite services ko
                      share kare or kamaye
                      30,000 tak mahina. Pick. Share. Earn.</p>
                    <div class="row p-10px-t">
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Own Boss</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Work from Home</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Zero Investment</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>#1 Services Reselling</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Free Trainings</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Part Time Work</li>
                        </ul>
                      </div>
                    </div>
                    <div class="btn-bar">
                      <button class="m-btn m-btn-theme" data-toggle="modal" data-target="#affiliateModal" href="#">Get Start</button>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <img src="{{static_asset('static/img/5000.png')}}" title="" alt="">
                </div>
                <!-- col -->

              </div>
              <!-- row -->
            </div>
            <!-- tab content -->

            <div class="tab-pane fade" id="pills-third" role="tabpanel" aria-labelledby="pills-third-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <img src="{{static_asset('static/img/10000.png')}}" title="" alt="">
                </div>
                <!-- col -->
                <div class="col-lg-6 md-m-30px-t">
                  <div class="card-box-01 p-50px-l  md-p-0px-l">
                    <label class="theme-color" style="font-weight: 500; color: #000;">Your Time Required</label>
                    <h3 class="font-alt dark-color">1 Hour a Day</h3>
                    <p class="large-text" style="font-weight: 500; color: #000;">apne customers ki favorite services ko
                      share kare or kamaye
                      30,000 tak mahina. Pick. Share. Earn.</p>
                    <div class="row p-10px-t">
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Own Boss</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Work from Home</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Zero Investment</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>#1 Services Reselling</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Free Trainings</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Part Time Work</li>
                        </ul>
                      </div>
                    </div>
                    <div class="btn-bar">
                      <button class="m-btn m-btn-theme" data-toggle="modal" data-target="#affiliateModal" href="#">Get Start</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- row -->
            </div>
            <!-- tab content -->

            <div class="tab-pane fade" id="pills-fourth" role="tabpanel" aria-labelledby="pills-fourth-tab">
              <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6 md-m-30px-t">
                  <div class="card-box-01 p-50px-l  md-p-0px-l">
                    <label class="theme-color" style="font-weight: 500; color: #000;">Your Time Required</label>
                    <h3 class="font-alt dark-color"> 2-3Hour a Day</h3>
                    <p class="large-text" style="font-weight: 500; color: #000;">apne customers ki favorite services ko
                      share kare or kamaye
                      30,000 tak mahina. Pick. Share. Earn.</p>
                    <div class="row p-10px-t">
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Own Boss</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Work from Home</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Zero Investment</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>#1 Services Reselling</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Free Trainings</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Part Time Work</li>
                        </ul>
                      </div>
                    </div>
                    <div class="btn-bar">
                      <button class="m-btn m-btn-theme" data-toggle="modal" data-target="#affiliateModal" href="#">Get Start</button>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <img src="{{static_asset('static/img/20000.png')}}" title="" alt="">
                </div>
              </div>
              <!-- row -->
            </div>
            <!-- tab content -->

            <div class="tab-pane fade" id="pills-fifth" role="tabpanel" aria-labelledby="pills-fifth-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <img src="{{static_asset('static/img/30000.png')}}" title="" alt="">
                </div>
                <!-- col -->
                <div class="col-lg-6 md-m-30px-t">
                  <div class="card-box-01 p-50px-l  md-p-0px-l">
                    <label class="theme-color" style="font-weight: 500; color: #000;">Your Time Required</label>
                    <h3 class="font-alt dark-color">5-6 Hours a Day</h3>
                    <p class="large-text" style="font-weight: 500; color: #000;">apne customers ki favorite services ko
                      share kare or kamaye
                      30,000 tak mahina. Pick. Share. Earn.</p>
                    <div class="row p-10px-t">
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Own Boss</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Work from Home</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Zero Investment</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <ul class="list-style-1 m-0px p-0px">
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>#1 Services Reselling</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Free Trainings</li>
                          <li class="theme-after" style="font-weight: 500; color: #000;"><i
                              class="ti-check theme-color"></i>Part Time Work</li>
                        </ul>
                      </div>
                    </div>
                    <div class="btn-bar">
                      <button class="m-btn m-btn-theme" data-toggle="modal" data-target="#affiliateModal" href="#">Get Start</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- row -->
            </div>
            <!-- tab content -->
          </div>
        </div>
      </div>
    </section>

    <!-- 
    =============================
      Faq's
    =============================
    -->
    <div class="section gray-bg">
      <div class="container">
        <div class="tab-style-2">
          <ul class="nav justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link dark-color theme-after active" id="pills-Features-tab" data-toggle="pill"
                href="#pills-Features" role="tab" aria-controls="pills-Features" aria-selected="false">For Womens</a>
            </li>

            <li class="nav-item">
              <a class="nav-link dark-color theme-after" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">For Moms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link dark-color theme-after" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">For Students</a>
            </li>

            <li class="nav-item">
              <a class="nav-link dark-color theme-after" id="pills-returns-tab" data-toggle="pill" href="#pills-returns"
                role="tab" aria-controls="pills-returns" aria-selected="false">For Businessman</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-Features" role="tabpanel"
              aria-labelledby="pills-Features-tab">
              <div class="accordion accordion-01">
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">1</span> क्या Ladies के लिए Work
                    from Home भी Possible है?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">सभी Readers का स्वागत है! अगर आपके मन में
                    भी यह सवाल काफी समय से चल रहा है तो आप
                    बिल्कुल सही जगह पर हैं। हम यहां बिना
                    इन्वेस्टमेंट के ऑनलाइन पैसा कमाने के तरीके के बारे में सबसे सटीक उत्तर खोजने में आपकी सहायता करने के
                    लिए हैं।
                    आपके प्रश्न का उत्तर देने के लिए, हाँ, महिलाओं के लिए वर्क फ्रॉम होम एक 100% viable और feasible
                    ऑप्शन है। अपने घर पे
                    आराम से, आप बिना इन्वेस्टमेंट के पैसा कमा सकते हैं। महिलाओं के लिए वर्क फ्रॉम होम भी एक पसंदीदा
                    ऑप्शन है, क्योंकि
                    व्यवसाय के साथ-साथ घर को मैनेज करना आसान और कम थका देने वाला हो जाता है।
                    तो, हाँ, यदि आप अपने करियर को फिर से शुरू करने की सोच रहे हैं, तो आपको बिना इन्वेस्टमेंट के घर से
                    अपना ऑनलाइन व्यवसाय
                    शुरू करना चाहिए।
                    ऑनलाइन व्यापार के बारे में अधिक जानने के लिए पढ़ना जारी रखें।
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">2</span>Online Reselling क्या
                    है?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">सरल शब्दों में, ऑनलाइन रसेल एक
                    manufacturer से प्रोडक्ट्स खरीद रहा है और इंटरनेट
                    की मदद से मार्जिन राशि जोड़कर ग्राहकों
                    को बेच रहा है।
                    beauty players जैसे कई reselling ऐप ने resellers के लिए अपना ऑनलाइन reselling व्यवसाय शुरू करना आसान
                    बना दिया है। जब आप
                    ऑनलाइन reselling कर रहे हों तो आपको salon के मालिक होने की आवश्यकता नहीं है। बस, beauty players ऐप
                    के ब्यूटी services को
                    अपने कस्टमर्स के साथ शेयर करें, बुकिंग प्राप्त करें, अपना मार्जिन जोड़ें और सर्विस को ऑनलाइन resell
                    करें। आपको अपने
                    ऑनलाइन रीसेलिंग व्यवसाय में कोई पैसा इन्वेस्टमेंट करने की आवश्यकता नहीं है।
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">3</span> आपको Online Reselling
                    पर विचार क्यों करना चाहिए?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">घर से काम करने वाली एक महिला के रूप में,
                    बिना इन्वेस्टमेंट के घर से ऑनलाइन
                    व्यवसाय शुरू करना एक ऐसा अवसर है जिसे आपको
                    छोड़ना नहीं चाहिए, भले ही आपके पास full-time नौकरी हो। ऑनलाइन reselling बिना इन्वेस्टमेंट और केवल
                    मुनाफे के लाभ के साथ
                    आता है। beauty players पर एक reseller के रूप में, आपको नए, ट्रेंडी और प्रीमियम ब्यूटी सर्विसेज सेल्ल
                    करने को मिलते हैं।
                    यह उन लोगों के लिए win-win situation है जो reselling करना चुनते हैं।
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">4</span>Beauty players क्या है?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">Beauty players भारत का #1 विश्वसनीय Salon
                    Services Reselling App है। यह उन लोगों
                    के लिए है जो अपना खुद का व्यवसाय शुरू
                    करके ऑनलाइन पैसा कमाना चाहते हैं। आप इस व्यवसाय को बिना किसी नइन्वेस्टमेंट के सेट उप कर सकते हैं।
                    दूसरे शब्दों में, आप
                    केवल प्रॉफिट कमा सकते हैं। यह सबसे अच्छी ऑनलाइन जॉब में से एक है जो घर से काम करने का ऑफर देती है।
                    आप अपने खुद के मालिक
                    हैं, आप अपने खुद के मैनेजर हैं! यह 100% जेन्युइन वर्क फ्रॉम होम जॉब में से एक है।
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">5</span>आपको Online Reselling के
                    लिए Beauty players क्यों चुनना चाहिए?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">अपनी user-friendly features के साथ, यह
                    महिलाओं के लिए इस ऐप से पैसा कमाना आसान
                    बनाता है। Beauty players में बहुत सारे
                    informative कोर्स भी हैं जो आपको reselling पर एक major शुरुआत करने में मदद कर सकते हैं। आप प्रतिदिन
                    केवल 5 से 6 घंटे
                    इन्वेस्ट करके ₹30,000 प्रति माह तक कमा सकते हैं। सारा प्रॉफिट सिर्फ आपका और आपका है। साथ ही, इन
                    लाभों के साथ, Beauty
                    players के माध्यम से बिना इन्वेस्टमेंट के ऑनलाइन पैसा कमाने का एक सबसे महत्वपूर्ण लाभ यह है कि आपको
                    महीने में 4 बार
                    salary मिलता है। हर शुक्रवार pay day है! तो आप किसका इंतज़ार कर रहे हैं? Beauty players के साथ आज ही
                    reseller बनें और
                    हाई प्रॉफिट कमाएं! केवल Beauty players से ₹25,000 प्रति माह तक कमाएं।
                  </div>
                </div>
              </div> <!-- accordion -->
            </div><!-- tab content -->

            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="accordion accordion-01">
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">1</span> माँ बनने के बाद अपने
                    काम को कैसे फिर से शुरू करें?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">एकसाथ घर और काम को संभालना वास्तव में
                    आसान नहीं है। लेकिन दूसरी ओर एक standard
                    of living को पूरा करने के लिए काम करना भी
                    आवश्यक है। जुनून के लिए भी, अपनी पसंद के area में काम करने से आप स्वस्थ रहते हैं। लेकिन जैसा कि पहले
                    कहा गया है, और हम
                    सभी जानते हैं कि tiresome और strict office टाइम का manage करना निश्चित रूप से आसान नहीं है। क्या आप
                    खुद को इस स्थिति में
                    पाते हैं, तो ऐसी नौकरी का choose करें जिसमें बहुत कम या कोई जोखिम न हो। उदाहरण के लिए रेसेल्लिंग की
                    तरह, beauty players
                    के साथ बिना किसी इन्वेस्टमेंट के ऑनलाइन रेसेल्लिंग शुरू करें, और सिर्फ हाई प्रॉफिट कमाएं! तोह है ना
                    यह बहुत बढ़िया।</div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">2</span>आपको वर्क फ्रॉम होम जॉब
                    का चुनाव कैसे करना चाहिए?
                    एक नई माँ के रूप में अपनी अगली नौकरी चूसे करते समय आपको कुछ parameters को ध्यान में रखना चाहिए:
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">(a). जांचें full-time है या फिर
                    part-time। उस नौकरी को चुनते समय आप शारीरिक और
                    मानसिक स्वास्थ्य के मामले में कितने तैयार
                    हैं। मॉम्स के लिए कुछ बहुत ही अचे वर्क फ्रॉम होम जॉब हैं जो आपको सही संतुलन बनाने और अपना ख्याल रखने
                    में मदद कर सकते
                    हैं।
                    उदाहरण के लिए: beauty players पर रीसेलिंग, अपने घर पे आराम से अपना ऑनलाइन रीसेलिंग व्यवसाय शुरू
                    करें।<br>

                    (b). यह जॉब आपको आपने हिसाब से काम करने का फ्रीडम देती है. अपना ऑनलाइन व्यवसाय शुरू करना या
                    फ्रीलांसिंग की दुनिया में
                    कदम रखना आज कल मॉम्स इस जॉब को बहुत पसंद करती है।
                    <br>

                    (c). आप जिस नौकरी को चूसे करते हो उसमें आपका इंटरेस्ट और qualification दोनों का मेल खाना ज़रूरी है।
                    कुछ ऐसा जॉब जो आप
                    अच्छी कमाई के साथ साथ वास्तव में आनंद भी दे। अगर बिजनेस आपका पैशन है तो आज के दौर में आपको ऑनलाइन
                    बिजनेस शुरू करना
                    चाहिए। क्योंकि इसमें कोई इन्वेस्टमेंट शामिल नहीं है, और आप केवल हाई प्रॉफिट कमा सकते हैं।
                    <br>

                    (d). एक नई माँ के रूप में, घर से flexible work from home jobs for moms की तलाश करना आपके लिए
                    स्वाभाविक है, जिसे आसानी से
                    adapted किया जा सकता है और आपकी routine के हिसाब से परफेक्ट हो। ऐसे में कई नई माँ ने ऑनलाइन रीसेलिंग
                    का विकल्प चुना है,
                    और उनका कहना है कि इसने उनके professional life को बहुत आसान बना दिया है।
                    <br>

                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">3</span>क्या आपको वर्क फ्रॉम होम
                    जॉब चुनना चाहिए?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">हां, अगर आपको लगता है कि आप अपने घर,
                    बच्चे और ऑफिस का manage करते हुए समय और
                    पैसा बचाना चाहते हैं। और honestly कौन ऐसा
                    नहीं चाहता? मोम के लिए वर्क फ्रॉम होम जॉब नई माताओं के जीवन को थोड़ा आसान बना देता है। तो हाँ, वर्क
                    फ्रॉम होम ऑप्शन
                    चुनने से आपको हमेशा बढ़त मिलती है और आपका बहुत समय बचता है, और इस जॉब में कोई परेशानी भी नहीं होती
                    है।
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">4</span>मोम के लिए वर्क फ्रॉम
                    होम जॉब क्यों चुनना चाहिए?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">(a). financial stability gain करने के लिए
                    - अपने बच्चे और परिवार को बेहतर
                    opportunities देने कमें सक्षम होने के लिए financial stability आवश्यक है।
                    <br>
                    (b). To bridge the gap in your resume - जब माँ बनने के बाद आपके रिज्यूमे में एक गैप आ जाता है तब उस
                    गैप के रीज़न को किसी को समझना बहुत मुश्किल होता है। लेकिन जब आप वर्क फ्रॉम होम जॉब को चुनती है तब
                    आपको आपने हिसाब से और टाइम पे काम करने का एक फ्रीडम मिल जाता है. तो कुल मिलाकर, यह एक बेस्ट ऑप्शन है
                    नई मॉम्स के लिए।
                    <br>
                    (c). अपने मौजूदा अनुभव में जोड़ने के लिए - अपने मौजूदा अनुभव का मैनेज करने में सक्षम होने से बेहतर
                    क्या है! अपना खुद का व्यवसाय शुरू करने से आपको इसका लाभ उठाने में मदद मिलेगी।
                    <br>
                    (d). work-life balance - काम और जीवन के बीच सही संतुलन बनाना हर नई माँ का सपना होता है। लेकिन वास्तव
                    में इसे हासिल करने में सक्षम होने के लिए, आपको सही चुनाव करने की जरूरत है। आपको माताओं के लिए
                    फ्लेक्सिबल वर्क फ्रॉम होम जॉब की आवश्यकता है। उदाहरण के लिए, beauty players पर रीसेलिंग एक ऐसा काम
                    है जो आपको काम और घर के बीच संतुलन बनाने में मदद कर सकता है।
                    <br>
                  </div>
                </div>
              </div> <!-- accordion -->
            </div> <!-- tab content -->

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="accordion accordion-01">
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">1</span>As a College Student
                    क्या आप Online Job कर सकते है ?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">उत्तर निस्संदेह हाँ है! कॉलेज के छात्र के
                    रूप में हम पॉकेट मनी पर भरोसा करते
                    हैं, लेकिन हम सच्चाई जानते हैं, कभी-कभी यह
                    sufficient नहीं होता है और हमें बहुत सी चीजों में भाग लेने से बचना पड़ता है। कुछ एक्स्ट्रा एअर्निंग
                    ही कॉलेज लाइफ में
                    हमारी मदद कर सकते हैं।
                    केवल पैसे कमाने के अलावा, एक कॉलेज का छात्र जब ऑनलाइन पार्ट-टाइम जॉब करता है तो study के अलावा भी
                    बहुत कुछ सीखता है। यह
                    उनके personality को निखारने में मदद कर सकता है और workplace में प्रवेश करते समय necessary practical
                    knowledge उनको आगे
                    बढ़ने में मददकर साबित हो सकता है।
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">2</span> क्या आपको ऑनलाइन
                    पार्ट-टाइम जॉब के रूप में रीसेलिंग को consider करना चाहिए?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">फिर से, निस्संदेह हाँ!
                    यदि आप students के लिए इन्वेस्टमेंट के बिना ऑनलाइन पैसे कमाने के तरीके के जवाब की तलाश में हैं, तो
                    आप सही वेबसाइट पर
                    पहुंच गए हैं।
                    जब आप beauty players के साथ reselling करना चुनते हैं, तो आप भारत के #1 विश्वसनीय reselling ऐप के साथ
                    resell शुरू करना
                    चुनते हैं। यहां, आपको अपना खुद का व्यवसाय शुरू करने, उसका management करने, उसकी मार्केटिंग करने और
                    हाई प्रॉफिट कमाने का
                    practical अनुभव मिलता है। बेशक, इसके माध्यम से आपकी सहायता करने के लिए teaching guides उपलब्ध हैं।
                    beauty players के साथ resell कुछ ही क्लिक के साथ शुरू किया जा सकता है! अपने पसंदीदा beauty service
                    को चुनें, उन्हें
                    share करें और कमाएं। यह बेहद आसान है!
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">3</span> आपको अभी reselling
                    क्यों शुरू करना चाहिए?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">एक कॉलेज student होने के वजह से आपके पास
                    थोड़ा खाली समय होगा बाकि full-time
                    employees के मुकाबले में। तो क्यों न इस टाइम
                    को monetize करे और अपना कुछ शुरू करें। अपने करियर की शुरुआत में अपना खुद का व्यवसाय शुरू करने से
                    आपको केवल बढ़त मिलेगी।
                    ऐसा इसलिए है क्योंकि जब तक आपको full-time job नहीं मिल जाती, तब तक यह एक feeler के रूप में भी काम
                    करता है, इसलिए आपको आज
                    से ही reselling शुरू करना चाहिए।</div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">4</span>आपको Beauty players के
                    साथ reselling का चुनाव क्यों करना चाहिए?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">Beauty Players भारत का #1 विश्वसनीय
                    रीसेलिंग ऐप है, जो कॉलेज के छात्रों को अपना
                    ऑनलाइन रीसेलिंग व्यवसाय आसानी से शुरू
                    करने में मदद करता है। popular, प्रीमियम और ट्रेंडिंग ब्यूटी सर्विस को फिर से sell करे और प्रति माह
                    ₹25,000 तक कमाएं।
                  </div>
                </div>

              </div> <!-- accordion -->
            </div><!-- tab content -->

            <div class="tab-pane fade" id="pills-returns" role="tabpanel" aria-labelledby="pills-returns-tab">
              <div class="accordion accordion-01">
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">1</span> Beauty players क्या है?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">Beauty players भारत का #1 विश्वसनीय
                    रीसेलिंग ऐप है। यह उन लोगों के लिए है जो
                    अपना खुद का व्यवसाय शुरू करके ऑनलाइन पैसा
                    कमाना चाहते हैं। आप इस व्यवसाय को बिना किसी नइन्वेस्टमेंट के सेट उप कर सकते हैं। दूसरे शब्दों में,
                    आप केवल प्रॉफिट कमा
                    सकते हैं। यह सबसे अच्छी ऑनलाइन जॉब में से एक है जो घर से काम करने का ऑफर देती है। आप अपने खुद के
                    मालिक हैं, आप अपने खुद
                    के मैनेजर हैं! यह 100% जेन्युइन वर्क फ्रॉम होम जॉब में से एक है।
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">2</span> ऑनलाइन रीसेलिंग क्या
                    है?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">ऑनलाइन रीसेलिंग एक बहुत ही सिंपल लेकिन
                    बहुत ही आकर्षक काम है। ऑनलाइन रीसेलिंग के
                    लिए किसी इन्वेस्टमेंट की आवश्यकता नहीं
                    होती है, जो सबसे महत्वपूर्ण बेनिफिट्स में से एक है। इसका मतलब यह भी है कि जब कोई व्यक्ति ऑनलाइन रसेल
                    का ऑप्शन चुनता है,
                    तो वह हाई प्रॉफिट कमाने का ऑप्शन चुनता है। इसमें कोई रिस्क नहीं है क्योंकि इसमें कोई इन्वेस्टमेंट
                    नहीं है। आपको फिजिकल
                    शॉप खोलने की ज़रूरत नहीं है। बस, beauty players ऐप के beauty services को अपने कस्टमर के साथ शेयर
                    करें, ऑर्डर प्राप्त
                    करें, अपना मार्जिन जोड़ें और ब्यूटी सर्विसेज को ऑनलाइन रसेल करें। आपको अपने ऑनलाइन रीसेलिंग व्यवसाय
                    में कोई पैसा
                    इन्वेस्टमेंट करने कीज़रूरत नहीं है।
                  </div>
                </div>
                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">3</span> कौन ऑनलाइन से पैसा कमा
                    सकता है?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">कोई भी व्यक्ति जो बिना किसी इन्वेस्टमेंट
                    के घर से पैसे कमाने का जवाब ढूंढ रहा
                    है, उसे ऑनलाइन रीसेलिंग का विकल्प चुनना
                    चाहिए। इसके साथ ही, कोई भी व्यक्ति जो ऑनलाइन एक्स्ट्रा पैसे कमाना चाहते है, उसे रेसेल्लिंग का ऑप्शन
                    चुनना चाहिए, जो कि
                    वर्क फ्रॉम होम जॉब कामों में से एक बेस्ट ऑप्शन है। ऑनलाइन रीसेलिंग करके पैसे कमाने के लिए आपको बस एक
                    फोन और एक अच्छा
                    इंटरनेट कनेक्शन चाहिए। इतना ही! आप सभी पैसे कमाने के लिए तैयार हैं।<br>
                    1. एक महिला जो अपनी पहचान बनाना चाहती है<br>
                    2. एक महिला जो परिवार में अपनी कमाई को जोड़ना चाहती है<br>
                    3. एक महिला जो बिना इन्वेस्टमेंट के अपना खुद का व्यवसाय शुरू करना चाहती है<br>
                    4. घर पर रहने वाली माँ जो ऑफिस में रिपोर्ट नहीं कर सकती,<br>
                    5. एक घर पर रहेकर जो अपने बच्चे के लिए बेहतर opportunities create करना चाहती है,<br>
                    6. एक घर पर रहने वाला जो वर्क फ्रॉम होम जॉब में से flexible काम की तलाश में है,<br>
                    7. एक कॉलेज का स्टूडेंट जो entrepreneurial spirit की भावना रखता है<br>
                    8. एक कॉलेज का स्टूडेंट जो ऑनलाइन पार्ट-टाइम जॉब करके पैसा कमाना चाहता है,<br>
                    9. एक professional जो second source of income बनाना चाहता है,<br>
                    10. एक professional जो monthly income में जोड़ना चाहता है।<br>
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">4</span>क्या Online Reselling का
                    क्या Future है?</a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">हाँ। जैसा कि अधिक से अधिक लोग
                    इन्वेस्टमेंट के बिना घर से काम की तलाश में हैं, यह
                    एक indication है कि business का यह area
                    फलफूल रहा है। काफी बड़ी संख्या में कस्टमर अपने परिचित लोगों के साथ ऑनलाइन खरीदारी करना पसंद करते
                    हैं। यह आपके व्यवसाय को
                    उन लोगों के बीच फलने-फूलने का मौका देता है जिन्हें आप जानते हैं और बाद में उन लोगों के बीच जिन्हें
                    आप नहीं जानते हैं।
                    डिजिटल युग ने मोबाइल फोन और इंटरनेट कनेक्शन तक उचित कनेक्शन प्रदान करते है, जो व्यापार और खरीदारी
                    दोनों के परिदृश्य को
                    बदल रहा है। आबादी का एक बड़ा हिस्सा घर से पैसा कमाने के तरीके तलाश रहा है। दूसरी ओर, आबादी का एक और
                    हिस्सा घर से ऑनलाइन
                    खरीदारी करने के तरीकों की तलाश कर रहा है। यह congruence ऑनलाइन रेसेल्लिंग बिज़नेस को फलफूल ने मदद कर
                    रही है।
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">5</span>Beauty players कैसे काम
                    करते हैं?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">Beauty Players पर रीसेलिंग शुरू करने के
                    लिए, इन steps को follow करें और प्रति
                    माह ₹25,000 तक कमाएं।<br>
                    Step 1 - मुफ्त में साइन अप करें - बिल्कुल कोई छिपा हुआ शुल्क नहीं। ऐप पर मुफ्त में साइन अप करें और
                    रीसेलिंग शुरू करें।<br>
                    Step 2 - ब्यूटी सर्विसेज को चुनें - 30 से भी ज्यादा categories में से चुनें।<br>
                    Step 3 - शेयर करें - आपके द्वारा चुने गए ब्यूटी सर्विसेज को व्हाट्सएप, फेसबुक और इंस्टाग्राम पर अपने
                    दोस्तों, परिवार और
                    परिचितों के साथ शेयर करें। जितना अधिक आप शेयर करते हैं, उतने अधिक बुकिंग आपको मिलते हैं।<br>
                    Step 4 - मार्जिन जोड़ें - अपने सर्विसेज में उपयुक्त मार्जिन जोड़ें। आप जो मार्जिन जोड़ते हैं वह पूरी
                    तरह से आपका
                    decision है।<br>
                    Step 5 - बुकिंग करे - डिलीवरी का सही पता जोड़ें और हम बाकी का ध्यान रखेंगे!<br>
                    Step 6 - कमाएँ - प्रक्रिया का सबसे दिलचस्प हिस्सा! हाँ कमाई! ऑनलाइन पैसा कमाना शुरू करें। सबसे अच्छी
                    बात यह है कि आपको
                    महीने में 4 बार salary मिलता है।<br>
                  </div>
                </div>

                <div class="acco-group">
                  <a href="#" class="acco-heading dark-color"><span class="no theme-bg">6</span> मैं Online Reselling
                    करके कितना कमा सकता हूँ?
                  </a>
                  <div class="acco-des" style="font-weight: 500; color: #000;">Online Reselling बिना किसी Investment के
                    घर से काम करने के लाभ के साथ आता है। यह
                    Resellers को High Quality, Premium और
                    Best-in-Class Beauty Experience Reselling करके केवल Profit कमाने का मौका देता है। Resellers को एक
                    Fix Margin 50 से
                    ज्यादा Beauty Services को चुनने का मौका मिलता है। आमतौर पर, एक Resellers जो Reselling Business Start
                    करता है, वह प्रति
                    माह ₹30 ,000 तक कमा सकता है। यह कमाई और भी ज्यादा हो सकती है अगर reseller चाहे तो यदि कोई reseller
                    अपने बिज़नेस में अधिक
                    समय लगाने का निर्णय लेता है और अधिक ग्राहकों से जुड़ता है।
                  </div>
                </div>
              </div> <!-- accordion -->
            </div><!-- tab content -->
          </div>
        </div> <!-- Tab style -->
      </div>
    </div>


    <!-- 
    =====================
    Video Bg
    ===================== 
    -->
    <section class="video-section theme-after section video-bg" data-vide-bg="{{static_asset('static/video/video')}}"
      data-vide-options="posterType: jpg, loop: ture, position: 0% 50%" 
      style="background-image: url('{{static_asset('static/video/video.jpg')}}');">
      <div class="container">
        <div class="video-box">
          <h6>Browse Nearby Salon at Home</h6>
          <h2 class="font-alt">1000+ Certified Beauty Experts | 500+ Beauty Services</h2>
          <a class="icon popup-youtube" href="https://www.youtube.com/watch?v=0T6BrvKAH2o"><i
              class="fa fa-play"></i></a>
        </div>
      </div>
    </section>

    <!--
    ======================
    Testimonial
    ======================
    -->
    <section class="section gray-bg">
      <div class="container">
        <div class="row justify-content-center m-45px-b sm-m-25px-b">
          <div class="col-md-10 col-lg-8 text-center">
            <div class="heading">
              <label class="white-color theme-after">Testimonials</label>
              <h2 class="white-color font-alt">Our Happy Reseller Community</h2>
              <p class="white-color">Jinhone part time beauty services resell karke apni income ko badaya</p>
            </div>
          </div>
          <!-- col -->
        </div>

        <div class="owl-carousel" data-items="3" data-nav-dots="ture" data-md-items="3" data-sm-items="2"
          data-xs-items="1" data-xx-items="1" data-space="50" data-center="false">
          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/3tyr7p6CmaTOzykIQq75ZSFNtfBxQuXN1HViIyI0aYA/rs:fit:512:512:1/g:ce/aHR0cHM6Ly9jZG4u/aWNvbnNjb3V0LmNv/bS9pY29uL2ZyZWUv/cG5nLTUxMi9hdmF0/YXItMzgwLTQ1NjMz/Mi5wbmc"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Dinesh</label>
                <span style="font-weight: 500; color: #000;">Delhi</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">Meri job chutne ki wajah se hamare ghar ka kharch
                chalana bhi mushkil ho gya tha. tab maine apna online
                reselling business start kiya or ab mai apni last salary se bhi jyada kama raha hu.
                Thank you my Beauty Players family!</p>
            </div>
          </div>
          <!-- testimonial -->

          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/IM5xUAMPLeVNAvrhd1sEzR8v9e9Pud2NTocPdgXnp7g/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/eC0yYWVqR2hDQUtr/Z094aVNBZVhBSGFI/YSZwaWQ9QXBp"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Shruti</label>
                <span style="font-weight: 500; color: #000;">Delhi</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">Maine shuruwat me chote se hi shuruwat kiya tha, but logo ke
                achche response aane ki wajah se aaj mere saath 500+ happy customers
                hai. or mai aage or bhi jyada karne me vishwas rakhti hu
              </p>
            </div>
          </div>
          <!-- testimonial -->

          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/IM5xUAMPLeVNAvrhd1sEzR8v9e9Pud2NTocPdgXnp7g/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/eC0yYWVqR2hDQUtr/Z094aVNBZVhBSGFI/YSZwaWQ9QXBp"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Deepali</label>
                <span style="font-weight: 500; color: #000;">Uttar Pardesh</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">Shuruwat me mujhe sirf 3-4 appointments hi milta tha,
                lekin abhi maine reselling karte hue nayi car kharidi hai,
                or ghar kharch chalane me apna pura support deti hu.
              </p>
            </div>
          </div>
          <!-- testimonial -->


          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/IM5xUAMPLeVNAvrhd1sEzR8v9e9Pud2NTocPdgXnp7g/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/eC0yYWVqR2hDQUtr/Z094aVNBZVhBSGFI/YSZwaWQ9QXBp"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Anjali</label>
                <span style="font-weight: 500; color: #000;">Delhi</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">Hostel me rehte hui pocket money k liye baar baar ghar se paise
                mangna mujhe achcha nahi lagta tha,
                isiliye maine
                reselling start kiya or aaj mai pocket money ke saath saath
                Apni padai ka pura kharch khud utha leti hu.
              </p>
            </div>
          </div>
          <!-- testimonial -->

          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/IM5xUAMPLeVNAvrhd1sEzR8v9e9Pud2NTocPdgXnp7g/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/eC0yYWVqR2hDQUtr/Z094aVNBZVhBSGFI/YSZwaWQ9QXBp"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Isha</label>
                <span style="font-weight: 500; color: #000;">Uttar Pradesh</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">Maine beauty services reselling karke apne liye nayi scooty
                khareedi,
                or apne bachcho ko english medium school me pada rahi hu
                Mere pati ko mujh pr garv hai

              </p>
            </div>
          </div>
          <!-- testimonial -->

          <div class="testimonial-01 border-all">
            <div class="testimonial-info">
              <div class="user">
                <img
                  src="https://imgs.search.brave.com/IM5xUAMPLeVNAvrhd1sEzR8v9e9Pud2NTocPdgXnp7g/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/eC0yYWVqR2hDQUtr/Z094aVNBZVhBSGFI/YSZwaWQ9QXBp"
                  title="" alt="">
              </div>
              <div class="info">
                <label class="dark-color">Preeti</label>
                <span style="font-weight: 500; color: #000;">Ghaziabad</span>
              </div>
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left dark-color"></i>
              <p style="font-weight: 500; color: #000;">mai aaj apne husband ko financial support kar sakti hu.
                mere bachche aaj achche school me padne jaate hai,
                beauty players ke saath mujhe confidence mila jo ek samay pr mai
                kho chuki thi.
              </p>
            </div>
          </div>
          <!-- testimonial -->
        </div>
      </div>
    </section>


    <!-- 
    =====================
    Latest Blog
    ===================== 
    -->
    <section id="blog" class="section" style="background: white">
      <div class="container">
        <div class="row justify-content-center m-45px-b sm-m-25px-b">
          <div class="col-md-10 col-lg-8 text-center">
            <div class="heading">
              <label class="theme-color theme-after">We Write</label>
              <h2 class="dark-color font-alt">Latet News</h2>
              <p style="font-weight: 500; color: #000;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
            </div>
          </div>
          <!-- col -->
        </div>
        <!-- row -->

        <div class="row">
          <div class="col-md-6 m-15px-tb">
            <div class="blog-item-1">
              <div class="blog-img">
                <img src="{{ static_asset('static/img/blog-1.jpg') }}" title="" alt="">
              </div>
              <div class="blog-info">
                <label class="cat theme-bg white-color">Latest</label>
                <h2 class="white-color">Awesome Design Best for Your Business.</h2>
                <span class="date white-color">August 16, 2018</span>
              </div>
              <a class="blog-link" href="#"></a>
            </div>
            <!-- Blog Item -->
          </div>
          <!-- col -->

          <div class="col-md-6 m-15px-tb">
            <div class="blog-item-1">
              <div class="blog-img">
                <img src="{{ static_asset('static/img/blog-2.jpg') }}" title="" alt="">
              </div>
              <div class="blog-info">
                <label class="cat theme-bg white-color">Events</label>
                <h2 class="white-color">Highlights New York Fashion Week 2018</h2>
                <span class="date white-color">August 16, 2018</span>
              </div>
              <a class="blog-link" href="#"></a>
            </div>
            <!-- Blog Item -->
          </div>
          <!-- col -->
        </div>
      </div>
      <!-- container -->
    </section>

    <!-- 
      ===========================
      contact us  
      ===========================
    -->
    <section id="contatus" class="section gray-bg">
      <div class="container">
        <div class="row justify-content-center m-60px-b sm-m-40px-b">
          <div class="col-md-10 col-lg-8 text-center">
            <div class="heading">
              <label class="white-color theme-after">Get In Touch</label>
              <h2 class="white-color font-alt">Contact Us</h2>
              <p class="white-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et
                dolore magna aliqua.</p>
            </div>
          </div>
          <!-- col -->
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="theme-bg">
              <div class="contact-info">
                <i class="ti-location-pin"></i>
                <h6>Our Address</h6>
                <p>123 Stree New York City , United States Of America 750065.</p>
              </div>
              <div class="contact-info">
                <i class="ti-mobile"></i>
                <h6>Our Phone</h6>
                <p>Office: +004 44444 44444<br> Office: +004 44444 44444<br></p>
              </div>
              <div class="contact-info">
                <i class="ti-email"></i>
                <h6>Our Email</h6>
                <p>info@domainname.com<br>contact@domainname.com</p>
              </div>
            </div>
          </div>

          {{-- <div class="col-lg-8 md-m-30px-t">
            <div class="contact-form">
              <h4 class="dark-color font-alt m-20px-b">Say Something</h4>
              <form class="contactform" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input id="name" name="name" type="text" placeholder="Name" class="validate form-control"
                        required="">
                      <span class="input-focus-effect theme-bg"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input id="email" type="email" placeholder="Email" name="email" class="validate form-control"
                        required="">
                      <span class="input-focus-effect theme-bg"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea id="message" placeholder="Your Comment" name="message" class="form-control"
                        required=""></textarea>
                      <span class="input-focus-effect theme-bg"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="send">
                      <button class="m-btn m-btn-theme" type="submit" name="send"> send message</button>
                    </div>
                    <span class="output_message"></span>
                  </div>
                </div>
              </form>
            </div>
          </div> --}}
          <!-- col -->
        </div>
      </div>
      <!-- container -->
    </section>

  </main>

@endsection

@section('script')
{{-- <script src="{{ static_asset('js/frontend/static/js/jquery-3.2.1.min.js')}}"></script> --}}
<script src="{{ static_asset('js/frontend/static/js/jquery-migrate-3.0.0.min.js')}}"></script>
<!-- End -->

<!-- Plugin JS -->
<script src="{{ static_asset('js/frontend/static/plugin/appear/jquery.appear.js')}}"></script>
<!--appear-->
<script src="{{ static_asset('js/frontend/static/plugin/bootstrap/js/popper.min.js')}}"></script>
<!--popper-->
{{-- <script src="{{ static_asset('js/frontend/static/plugin/bootstrap/js/bootstrap.js')}}"></script> --}}
<!--bootstrap-->
<!-- End -->

<!-- Custom -->
<script src="{{ static_asset('js/frontend/reseller_page.js') }}"></script>
@endsection
