@extends('frontend.layouts.app')


@section('meta')
<!-- Fontawesome CSS -->
<script src="https://kit.fontawesome.com/9b6c6cb0f0.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{asset('public/beauty_experts_assets/css/landing-mob.css')}}">
<link rel="stylesheet" href="{{asset('public/beauty_experts_assets/css/dropdown.css')}}">
<link rel="stylesheet" href="{{asset('public/beauty_experts_assets/css/css-index-new.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.0/swiper-bundle.css" integrity="sha512-W3EpFysZWfMjkA5NIsJ1jQbd2CvZrEY0YRB16wlQdePUuxykf4E47/Yqajz2vkCRcMYkxY9+CHY6r2Al0AExBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js" integrity="sha512-naEQG74IcOLQ6K/B1PmhIcZ4i3YE2FXs2zm603E1Q3shbron+PmYLg44/q+xAymD/RvskZ2H8l1Qa7I5qELlrg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;800;900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" rel="stylesheet" />


<style>
    .body-change {
        background: #FFFFFF !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #13A300 !important;
        color: #fff !important;
    }

    .nav-link:hover {
        color: #B5245F !important;
    }

    .DesktopAccordion-section-texts {
        margin-top: 0 !important;
    }

    .empowered-dotpe-section {
        margin-top: 0 !important;
    }

    a {
        color: #13A300 !important;
    }

    .btn-primary-new {
        border-color: #13A300 !important;
    }

    .btn-primary-new:hover {
        border-color: #13A300 !important;
    }

    .active::after {
        content: '';
    }

    .tabs-image {
        width: 500px !important;
        height: auto !important;
        padding: 20px !important;
    }

    .tab-pane {
        background-color: #eee !important;
        padding: 30px !important;
        border-radius: 20px !important;
    }

    .nav-link {
        text-align: center !important;
        font-size: 15px !important;
        font-weight: bolder;
    }

    .nav-item {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .bx-prev {
        position: absolute !important;
        left: -100px !important;
        /* background: #eee !important; */
        border-radius: 50% !important;
        background: url(images/controls.png) -43px -32px no-repeat;
    }

    .bx-next {
        position: absolute !important;
        right: -100px !important;
        /* background: #eee !important; */
        border-radius: 50% !important;
        background: url(images/controls.png) -43px -32px no-repeat;
    }

    .bx-wrapper {
        height: 55px !important;
    }

    .DesktopAccordion-open-text:hover {
        background-color: #B5245F !important;
        box-shadow: 0 0 10px 0 #B5245F inset, 0 0 10px 4px #B5245F !important;
        border: 1px solid #B5245F !important;
    }

    #landing-form-show-update:hover {
        background-color: #B5245F !important;
        box-shadow: 0 0 10px 0 #B5245F inset, 0 0 10px 4px #B5245F !important;
        border: 1px solid #B5245F !important;
    }

    .video-detail-wrap {
        box-shadow: 0px 3px 12px #eee !important;
    }

    .video-desktop-section .row {
        padding: 10px !important;
    }

    @media only screen and (max-width: 768px) {
        .bx-prev {
            position: absolute !important;
            top: 80px !important;
            right: 0px !important;
            left: 0px !important;
            margin-bottom: 50px !important;
        }

        .bx-next {
            position: absolute !important;
            top: 80px !important;
            right: -5px !important;
            /* left: 690px !important; */
            margin-bottom: 50px !important;
        }

        .tabs-image {
            width: 300px !important;
            height: auto !important;
        }
    }

    @media only screen and (max-width: 425px) {
        .bx-prev {
            position: absolute !important;
            top: 80px !important;
            right: 0px !important;
            left: 0px !important;
            margin-bottom: 50px !important;
        }

        .bx-next {
            position: absolute !important;
            top: 80px !important;
            right: -5px !important;
            /* left: 360px !important; */
            margin-bottom: 50px !important;
        }
    }

    @media only screen and (max-width: 375px) {
        .bx-prev {
            position: absolute !important;
            top: 80px !important;
            right: 0px !important;
            left: 0px !important;
            margin-bottom: 50px !important;
        }

        .bx-next {
            position: absolute !important;
            top: 80px !important;
            right: -5px !important;
            /* left: 315px !important; */
            margin-bottom: 50px !important;
        }
    }

    @media only screen and (max-width: 320px) {
        .bx-prev {
            position: absolute !important;
            top: 80px !important;
            right: 0px !important;
            left: 0px !important;
            margin-bottom: 50px !important;
        }

        .bx-next {
            position: absolute !important;
            top: 80px !important;
            right: -5px !important;
            /* left: 260px !important; */
            margin-bottom: 50px !important;
        }
    }
</style>

@endsection





@section('content')


<div class="business-start-part body-change">
    <div class="heading-area-part">
        <h1>Apna Digital Salon <br /> Shuru Kare or Kamaye ₹40,000/Month</h1>
        <p>Miliye Aapke Najdeeki Customers se Online, Dijiye Khud ko Pehchan</p>
        <a href="https://www.canva.com/design/DAFDW04Yerw/watch">
            <button type="button" id="landing-form-show-update">Go Online</button>
        </a>
    </div>
    <div class="top-design-head-image">
        <img src="https://www.beautyplayers.com/public/uploads/all/zin0QGcMugP9Gl9Od2IiVBboZTVJTS76xRrVFfCb.png">
    </div>
</div>

<div class="accordionForDesktop body-change">
    <div class="DesktopAccordion-section">
        <div class="DesktopAccordion-section-texts">
            <h2 class="DesktopAccordion-section-text">Salon at Home <span>Your Clients, Your Business</span></h2>
        </div>
        <div class="DesktopAccordions-items">
            <a href="#grow-business-form">
                <div class="DesktopAccordion-item">
                    <div class="DesktopAccordion-image"><img src="https://www.beautyplayers.com/public/uploads/all/yfl77T8OyIzf9zin7dkEopkgmPNs1xAoguBKqeoQ.png">
                        <p class="DesktopAccordion-image-text">
                            <span class="text-dark">Mai <br /> hu <br /> Ready</span> Digital <br /><span class="text-dark"> Hone ke liye</span>
                        </p>
                    </div>

                    <div class="DesktopAccordion-text DesktopAccordion-open-text">
                        <p>Shuru Kare</p>
                        <img class="DesktopArrow-icon" src="https://www.beautyplayers.com/public/uploads/all/D1NKeU9YDPhwSFDk6MEIHJWAsVMvM8S6v0nNtAFZ.png">
                    </div>
            </a>

        </div>
        <div class="DesktopAccordion-item">
            <div class="item">
                <div class="row">
                    <div class="col-12 mt-5">
                        <p>Mai pehle hi <br /> online services de rahi hu?</p>
                    </div>
                    <div class="col-12">
                        <a href="#grow-business-form">
                            <img class="" src="https://www.beautyplayers.com/public/uploads/all/8aexQwyxpP6P7gkEcHKyMZnjNLIGuphGoaP6nSsG.png" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-12 mt-5">
                        <p>Mai Fresher hu<br /> Kya mai bhi Salon at Home kar sakti hu ? </p>
                    </div>
                    <div class="col-12 ">
                        <a href="#grow-business-form">
                            <img class="" src="https://www.beautyplayers.com/public/uploads/all/8aexQwyxpP6P7gkEcHKyMZnjNLIGuphGoaP6nSsG.png" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="accordianForMobile body-change">
    <div class="accordion-section">
        <div class="accordion-section-texts">
            <h2 class="accordion-section-text">Complete Salon <br> <span>Services, at Home</span></h2>
        </div>
        <div class="accordions-items">
            <div class="accordion-item ">
                <div class="accordion-image open-accordion">
                    <img src="https://www.beautyplayers.com/public/uploads/all/hND8EXJblrkuj2UGtx1MTEO7TKXpRrYgFX8SNdRY.png" alt="img">
                </div>

                <div class="accordion-text accordion-open-text">
                    <a href="#grow-business-form">
                        <p>Get Started</p>
                        <img class="arrow-icon" src="../cdn.Beauty Players.in/cfe/image/testing-image-3-18-nov.png">
                    </a>
                    </a>
                </div>

            </div>
            <div class="accordion-item ">
                <div class="accordion-text">
                    <a href="#grow-business-form">
                        <p class="text-dark">Already selling online on marketplace?</p>
                        <img class="arrow-icon" src="../cdn.Beauty Players.in/cfe/image/testing-image-4-18-nov.png">
                    </a>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-text">
                    <a href="#grow-business-form">
                        <p class="text-dark">Need help in starting e-commerce website?</p>
                        <img class="arrow-icon" src="../cdn.Beauty Players.in/cfe/image/testing-image-4-18-nov.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="e-comm-website-part body-change" style="overflow-x: hidden">
    <div class="container">
        <div class="business-soution-section-texts">
            <h2 class="business-soution-section-text">Complete Solution <br> <span>for Salon at Home</span></h2>
        </div>
        <div class="slider-ecom-website-section">
            <div class="swiper-container swiper3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img loading="lazy" style="width: 350px !important; border-radius:20px !important;" src="./public/beauty_experts_assets/images/1.jpg" class="img-fluid" alt="carousel-img">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" style="width: 350px !important; border-radius:20px !important;" src="./public/beauty_experts_assets/images/2.jpg" class="img-fluid" alt="carousel-img">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" style="width: 350px !important; border-radius:20px !important;" src="./public/beauty_experts_assets/images/3.jpg" class="img-fluid" alt="carousel-img">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" style="width: 350px !important; border-radius:20px !important;" src="./public/beauty_experts_assets/images/4.jpg" class="img-fluid" alt="carousel-img">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" style="width: 350px !important; border-radius:20px !important;" src="./public/beauty_experts_assets/images/5.jpg" class="img-fluid" alt="carousel-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="one-stop-solution-part body-change">
    <div class="container">
        <div class="solution-main-head mb-4">
            <h2> Manage Everything <span class="bold-text-part"> with <br /> Beauty Players</span></h2>
        </div>
        <ul class="nav nav-pills mb-3 bxslider" id="pills-tab" role="tablist" style="height: 45px !important;">
            <li class="nav-item">
                <a class="nav-link active" style="font-size:15px !important;font-weight:500 !important;" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Easy to Start</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:15px !important;font-weight:500 !important;" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-profile" aria-selected="false">Easy to Manage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-size:15px !important;font-weight:500 !important;" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-contact" aria-selected="false">Work from Anywhere</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-home" aria-selected="true">Online Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-home" aria-selected="true">Chat with Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-6-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-home" aria-selected="true">Performance Summary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-7-tab" data-toggle="pill" href="#pills-7" role="tab" aria-controls="pills-home" aria-selected="true">Reviews & Ratings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-8-tab" data-toggle="pill" href="#pills-8" role="tab" aria-controls="pills-home" aria-selected="true">Message Blast</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-9-tab" data-toggle="pill" href="#pills-9" role="tab" aria-controls="pills-home" aria-selected="true">Social Post Creator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-10-tab" data-toggle="pill" href="#pills-10" role="tab" aria-controls="pills-home" aria-selected="true">Manage Social Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab" aria-controls="pills-home" aria-selected="true">Manage Google Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-12-tab" data-toggle="pill" href="#pills-12" role="tab" aria-controls="pills-home" aria-selected="true">Invite Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " style="font-size:15px !important;font-weight:500 !important;" id="pills-13-tab" data-toggle="pill" href="#pills-13" role="tab" aria-controls="pills-home" aria-selected="true">Marketing Activities</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;"> Start <br /> Your Online Salon
                                    at Home <span class="web-text">in
                                        Just 5 Minutes</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Sirf 5 Min me apna Digital Salon at Home shuru kare
                                    Or mile apne najdeeki customers se, Aap Salon at Home services dekar mahine ka 40,000 tak kama
                                    sakte
                                    hai,
                                    Beauty Players isi Promise ke saath aapka swagat karta hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/hEMmGqZuhpiNdln4JBSP8jVS83Ik8GeJ0yYwwnVY.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;"><span class="marketing">Get New
                                        Bookings</span> From Your Website.</h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Beauty Players per Aap khud ki Website, Google
                                    Business Page, Facebook, Instagram, Twitter pages ke
                                    dwara naye Customers se milte hai or Online Appointment Direct Aapke Mobile per Milti Hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/iESdC6K9Hh5avv4ZZ8L2DjOT30sf7JnOKS8KepOG.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/hGFneiLTdV3miIFD37jYsL7donudaP92yoJ54dZw.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Work from <span class="orders">Anywhere</span> <br /></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap Delhi/NCR me Kisi bhi Location me Apni Job
                                    Active Kijiye or miliye Najdeeki Customers se jo
                                    Dhoond rahe hai apne Nearby Beauty Experts. Aapke Customers Aapka Digital Cateloge Dekh kar Online
                                    Appointments Book kar Sakte Hai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Chat with <br /> <span class="seamless">your customers</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Najdeeki customers aapki website per aapse direct
                                    consult kar sakte hai, aap unka concern samajh
                                    kar unhe
                                    professionally guide kar sakte hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/A1lb8lc1INWkMzk3VMH11CJI0mftUwOBWIcxFPFw.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/SBDrgloyQ10EGQOB9WvOsPR1zDXvkKgmbJ8RVA61.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;"><span class="across-pin-text">
                                        Apna <br /> Performance </span> Reports <br /> Dekhe</h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap Daily, Monthly, Weekly, Yearly apna performance
                                    reports dekh sakte hai jisse aapko pata chalta
                                    hai aap kitna bookings kar chuke hai, kitna earning hua hai, aapke customer ko kya achcha lagta
                                    hai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-8" role="tabpanel" aria-labelledby="pills-8-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-9" role="tabpanel" aria-labelledby="pills-9-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12-tab">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-13" role="tabpanel" aria-labelledby="pills-13-tab">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row">
                            <div class="col-12 p-4">
                                <h3 class="font-weight-bolder m-0" style="font-size: 2rem;">Apna Salon <br /> <span class="catalog">Manage Kijiye, Apne Mobile Se.</span></h3>
                            </div>
                            <div class="col-12 mt-3">
                                <p class="my-auto ml-2" style="font-size: 16px !important;color:#6C6D72 !important;">Aap apne Customers, Services, Prices and
                                    Appointments ek hi jagah pr Bahut Asaani se Apne Mobile
                                    se Manage kar Sakte Hai or Apne Customers ko Online Offers, Discounts bhi Share kar Sakte Hai
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="img-fluid tabs-image" src="https://www.beautyplayers.com/public/uploads/all/qhdziaOGbtg6rCvDrrAxRCUZAwCMo8upL4fqXyFP.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="trusted-business-section body-change">
    <div class="container">
        <div class="trusted-content">
            <h2><span class="trusted">Trusted by </span> <br /> Hundreds of Beauty Experts</h2>
        </div>
        <div class="trusted-content-desktop">
            <h2><span class="trusted">Trusted by </span> <br /> Hundreds of Beauty Experts</h2>
        </div>
        <div class="video-section-update-wrap">
            <div class="row control-update">
                <div class="testimonial-video-update">
                    <div class="video-part">
                        <img src="https://www.beautyplayers.com/public/uploads/all/caCFcNG9jmcmyepdejq1iMzknGxadqEw4AvdeVur.jpg" style="width:100% !important;" class="img-fluid" alt="">
                    </div>
                    <div class="video-text-part">
                        <div class="video-text-image">
                            <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/PR5Df9go9n2D4n4MW2SvTwmjgBFljnDZy9KD5IXP.png">
                        </div>
                        <div class="video-update">
                            <h3>Seema Sharma</h3>
                            <p>Beauty Expert</p>
                        </div>
                    </div>
                    <!-- <div class="video-description">
                <p>Easily control your business with powerful & advanced features like add staff members, store timings
                  etc. Easily control your business with powerful analytics.</p>
              </div> -->
                </div>
                <div class="testimonial-video-update">
                    <div class="video-part"><img src="https://www.beautyplayers.com/public/uploads/all/2z7YVhPnCdglk20vBNz777Mu5qbSEssP4RqyySDl.jpg" style="width:100% !important;" class="img-fluid" alt="">
                    </div>
                    <div class="video-text-part">
                        <div class="video-text-image">
                            <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/7yjVxL10mnQYGGvovhH9Ms3AtsCipHeB7GQ9JrNl.png">
                        </div>
                        <div class="video-update">
                            <h3>Kanika Dogra</h3>
                            <p>Nail Artist</p>
                        </div>
                    </div>
                    <!-- <div class="video-description">
                <p>Easily control your business with powerful & advanced features like add staff members, store timings
                  etc. Easily control your business with powerful analytics.</p>
              </div> -->
                </div>
                <div class="testimonial-video-update">
                    <div class="video-part"><img src="https://www.beautyplayers.com/public/uploads/all/9Dx9cGc6zwpbgAdL2ivbRJ6a65EXb0AtlNUiaMEY.jpg" style="width:100% !important;" class="img-fluid" alt="">
                    </div>
                    <div class="video-text-part">
                        <div class="video-text-image">
                            <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/MXi6NmQWVHfqPo4BaNv7bfrRhcZAO7LtLlNHrnjg.png">
                        </div>
                        <div class="video-update">
                            <h3>Shahid Qureshi</h3>
                            <p>Hairdresser</p>
                        </div>
                    </div>
                    <!-- <div class="video-description">
                <p>Easily control your business with powerful & advanced features like add staff members, store timings
                  etc. Easily control your business with powerful analytics.</p>
              </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="video-desktop-section body-change">
    <div class="container">
        <h2><span class="trusted">Trusted by </span> <br /> Hundreds of Beauty Experts</h2>
        <div class="row">
            <div class="video-detail-wrap">
                <div class="video-final-desktop">
                    <img src="https://www.beautyplayers.com/public/uploads/all/caCFcNG9jmcmyepdejq1iMzknGxadqEw4AvdeVur.jpg" style="width:100% !important;" class="img-fluid" alt="">
                </div>
                <div class="video-detail-text">
                    <div class="video-new-image-desktop">
                        <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/PR5Df9go9n2D4n4MW2SvTwmjgBFljnDZy9KD5IXP.png">
                    </div>
                    <div class="video-new-text">
                        <h3>Seema Sharma</h3>
                        <p>Beauty Expert</p>
                    </div>
                </div>
                <!-- <div class="video-description">
              <p>Easily control your business with powerful & advanced features like add staff members, store timings
                etc. Easily control your business with powerful analytics.</p>
            </div> -->
            </div>
            <div class="video-detail-wrap">
                <div class="video-final-desktop">
                    <img src="https://www.beautyplayers.com/public/uploads/all/2z7YVhPnCdglk20vBNz777Mu5qbSEssP4RqyySDl.jpg" style="width:100% !important;" class="img-fluid" alt="">
                </div>
                <div class="video-detail-text">
                    <div class="video-new-image-desktop">
                        <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/7yjVxL10mnQYGGvovhH9Ms3AtsCipHeB7GQ9JrNl.png">
                    </div>
                    <div class="video-new-text">
                        <h3>Kanika Dogra</h3>
                        <p>Nail Artist</p>
                    </div>
                </div>
                <!-- <div class="video-description">
              <p>Easily control your business with powerful & advanced features like add staff members, store timings
                etc. Easily control your business with powerful analytics.</p>
            </div> -->
            </div>
            <div class="video-detail-wrap">
                <div class="video-final-desktop"><img src="https://www.beautyplayers.com/public/uploads/all/9Dx9cGc6zwpbgAdL2ivbRJ6a65EXb0AtlNUiaMEY.jpg" style="width:100% !important;" class="img-fluid" alt="">
                </div>
                <div class="video-detail-text">
                    <div class="video-new-image-desktop">
                        <img loading="lazy" src="https://www.beautyplayers.com/public/uploads/all/MXi6NmQWVHfqPo4BaNv7bfrRhcZAO7LtLlNHrnjg.png">
                    </div>
                    <div class="video-new-text">
                        <h3>Shahid Qureshi</h3>
                        <p>Hairdresser</p>
                    </div>
                </div>
                <!-- <div class="video-description">
              <p>Easily control your business with powerful & advanced features like add staff members, store timings
                etc. Easily control your business with powerful analytics.</p>
            </div> -->
            </div>
        </div>
    </div>
</div>
<div class="empowered-dotpe-section body-change">
    <div class="logo-list-main-head mt-5">
        <h2>#beautyplayers</h2>
    </div>
    <div class="restaurant-image">
        <img loading="lazy" class="img-fluid m-auto" style="width: 1200px;height:auto;" src="https://www.beautyplayers.com/public/uploads/all/Ttg5w2od8aHAh6D7wjBwqBcqS5DZn96V2wsnZLSr.png">
    </div>
    <div class="restaurant-mobile-logo-image">
        <img loading="lazy" class="img-fluid m-auto" style="width: 1200px;height:auto;" src="https://www.beautyplayers.com/public/uploads/all/Ttg5w2od8aHAh6D7wjBwqBcqS5DZn96V2wsnZLSr.png">
    </div>
</div>

@endsection






@section('script')
<script src="{{asset('public/beauty_experts_assets/js/accordian.js')}}"></script>
<script src="../unpkg.com/swiper%408.3.0/swiper-bundle.min.js"></script>
<script src="../ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{asset('public/beauty_experts_assets/js/index-customform.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>


<script>
    if (jQuery(window).width() > 768) {
        $(document).ready(function() {
            $('.bxslider').bxSlider({
                mode: 'horizontal',
                moveSlides: 1,
                slideMargin: 40,
                infiniteLoop: true,
                slideWidth: 300,
                pager: false,
                controls: true,
                minSlides: 4,
                maxSlides: 20,
                shrinkItems: true,
                speed: 800,
                // auto: true
            });
        });
    }
    if (jQuery(window).width() < 768) {
        $(document).ready(function() {
            $('.bxslider').bxSlider({
                mode: 'horizontal',
                moveSlides: 1,
                slideMargin: 40,
                infiniteLoop: true,
                slideWidth: 1000,
                pager: false,
                controls: true,
                minSlides: 1,
                maxSlides: 20,
                shrinkItems: true,
                speed: 800,
                // auto: true
            });
        });
    }
</script>

<script>
    document.querySelector('#copyright-year').innerText = new Date().getFullYear();
</script>

<script>
    function formSubmit() {
        document.getElementById('form-success').style.display = 'block'
    }

    function formCloseDemo() {
        document.getElementById('form-success').style.display = 'none'
    }
</script>
<script>
    function topMenu() {
        const headMenu = document.querySelector('.links'),
            iconElement = document.getElementById('new-demo'),
            closeElement = document.getElementById('close-icon');
        if (iconElement.style.display === "block") {
            iconElement.style.display = "none";
            closeElement.style.display = "block";
        } else {
            iconElement.style.display = "block";
            closeElement.style.display = "none";
        }


        if (headMenu.style.display === "none") {
            headMenu.style.display = "block";
        } else {
            headMenu.style.display = "none";
        }
    }
    var swiper_logo = new Swiper('.swiper2', {
        slidesPerView: '1',
        speed: 2500,
        grabCursor: true,
        mousewheelControl: true,
        keyboardControl: true,
        centerSlides: true,
        loop: true,
        spaceBetween: 0,
        autoplay: {
            delay: 0,
            disableOnInteraction: false
        },
    });

    function gotoCategory(id) {
        var element = document.getElementById(id);
        element.scrollIntoView({
            behavior: "smooth",
            block: "center",
        });
        document.body.scrollTop = element.offsetTop - 200;
        var activeElement = document.getElementsByClassName('active');
        if (activeElement.length) {
            activeElement[0].classList.remove('active')
        }
        var tabElement = document.getElementById('new-' + id);
        tabElement.classList.add('active');

    }

    function formClose() {
        document.getElementById('form-close').style.display = 'none'
    }
    var swiper = new Swiper('.swiper3', {
        slidesPerView: '2',
        speed: 3000,
        grabCursor: true,
        mousewheelControl: true,
        keyboardControl: true,
        centerSlides: true,
        loop: true,
        spaceBetween: 0,
        autoHeight: false,
        autoplay: {
            delay: 1,
            disableOnInteraction: false
        },
        breakpoints: {
            0: {
                slidesPerView: '2',
                spaceBetween: 0,
            },
            768: {
                slidesPerView: '3',
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: '5',
                spaceBetween: 0,
            },

        },

    });
</script>
<script type="text/javascript">
    function numbersonly(myfield, e, dec) {
        var key;
        var keychar;
        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        keychar = String.fromCharCode(key);
        // control keys
        if ((key == null) || (key == 0) || (key == 8) ||
            (key == 9) || (key == 13) || (key == 27))
            return true;
        // numbers
        else if ((("0123456789").indexOf(keychar) > -1))
            return true;
        // decimal point jump
        else if (dec && (keychar == ".")) {
            myfield.form.elements[dec].focus();
            return false;
        } else
            return false;
    }
</script>

<script>
    $('.nav-link').click(function() {
        $('.nav-link').removeClass('active');
    });
</script>


@endsection