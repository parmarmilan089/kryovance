<!-- Extends template page-->
@extends('user.layout.header')
<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->
    <main>
        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" >
            <div class="overlay" data-bg-color="#efefef"></div>
            <div class="container">
                <h1 class="page_title text-white">About Us</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->
        <!-- map_section - start
        ================================================== -->

<!-- Why Printer -->
<div class="whyFlex">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="whyMainContent">
                    <span class="whySubtitle bg-primary-opacity">
                        Kryovance
                    </span>
                    <h2 class="Whytitle">
                        "About Us"
                    </h2>
                    <p>
                        Welcome to PrintPro Solutions, your trusted local printing partner!
                    </p>
                    <p>
                       With years of experience in the printing industry, we take pride in delivering high-quality, fast, and affordable printing services for individuals and businesses alike.
                    </p>
                    <p>
                       Whether you need business cards, banners, flyers, brochures, posters, or customized prints, we’re here to bring your vision to life. Our team uses the latest printing technology and premium materials to ensure crisp results every time.
                    </p>
                    <div class="why-cta">
                        <a href="#">Model Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="whyImg">
                    <div class="why-dots">
                        <img src="{{asset('user/assets/images/dots.svg')}}" alt="" />
                    </div>
                    <div class="purple-circle">
                        <img src="{{asset('user/assets/images/purple-circle.svg')}}" alt="" />
                    </div>
                    <div class="why-girl-img">
                        <img src="{{asset('user/assets/images/why-img.png')}}" alt="" />
                    </div>
                    <div class="why-qutote">
                        <img src="{{asset('user/assets/images/light-printer.svg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Printer  -->

    <!-- <section class="main_contact_section sec_ptb_100 clearfix">
        <div class="container">
        <div class="row">
            <div class="four col-md-3">
                <div class="counter-box colored"> <i class="fa fa-thumbs-up"></i> <span class="counter">2147</span>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="four col-md-3">
                <div class="counter-box"> <i class="fa fa-user-alien"></i> <span class="counter">3275</span>
                    <p>Registered Members</p>
                </div>
            </div>
            <div class="four col-md-3">
                <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">289</span>
                    <p>Available Products</p>
                </div>
            </div>
            <div class="four col-md-3">
                <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter">1563</span>
                    <p>Saved Trees</p>
                </div>
            </div>
        </div>
    </div>
 </section> -->


        <!-- map_section - end
        ================================================== -->
        <!-- main_contact_section - start
        ================================================== -->
      <!-- main_contact_section - start
        ================================================== -->
        <section class="main_contact_section sec_ptb_100 clearfix">
            <div class="container">
                <div class="row justify-content-lg-between">
                    <div class="col-lg-5">
                        <div class="main_contact_content">
                            <h3 class="title_text mb_15">Get In Touch</h3>
                            <p class="mb_50">
                                If you are interested in working with us, please get in touch.
                            </p>
                            <ul class="main_contact_info ul_li_block clearfix">
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-map-marked-alt"></i>
                                    </span>
                                    <p class="mb-0">
                                        75 South Park Avenue, India
                                    </p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-phone-volume"></i>
                                    </span>
                                    <p class="mb-0">97119 10821</p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <i class="fal fa-paper-plane"></i>
                                    </span>
                                    <p class="mb-0">sales@slsyn.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="main_contact_form">
                            <h3 class="title_text mb_30"></h3>
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form_item">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Send FeedBack</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- main_contact_section - end
        <!-- map_section - start
        ================================================== -->
        <!-- main_contact_section - end
        ================================================== -->
    </main>
    <!-- main body - end
    ================================================== -->

        <style>
      .breadcrumb_section {
    z-index: 1;
    min-height: 350px;
    position: relative;
    padding: 100px 0px;
    padding-bottom: 40px;
}

.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box.colored {
    background: #3acf87
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}

.gray {
  color: #a5a5a5;
}

.team{
  margin:40px;
}

.team-member {
  margin: 15px 0;
  padding: 0;
}

.team-member figure {
  position: relative;
  overflow: hidden;
  padding: 0;
  margin: 0;
}

.team-member figure img {
  min-width: 100%;
}

.team-member figcaption p {
  font-size: 16px;
}

.team-member figcaption ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.team-member figcaption ul {
  visibility: visible;
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition: all 0.1s ease-in-out;
  -o-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
}

.team-member figcaption ul li {
  display: inline-block;
  padding: 10px;
}

.team-member h4 {
  margin: 10px 0 0;
  padding: 0;
}

.team-member figcaption {
  padding: 50px;
  color: transparent;
  background-color: transparent;
  position: absolute;
  z-index: 996;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 0;
  overflow: hidden;
  visibility: hidden;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.team-member figure:hover figcaption {
  visibility: visible;
  color: #fff;
  background: rgba(230, 78, 62, 0.9);
  /* Primary color, can be changed via colors.css */

  height: 100%;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.team-member figure:hover figcaption ul li a:hover {
  color: rgba(49, 49, 49, .97);
}

.team-member figure img {
  -webkit-transform: scale(1) rotate(0) translateY(0);
  -moz-transform: scale(1) rotate(0) translateY(0);
  -o-transform: scale(1) rotate(0) translateY(0);
  -ms-transform: scale(1) rotate(0) translateY(0);
  transform: scale(1) rotate(0) translateY(0);
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.team-member figure:hover img {
  -webkit-transform: scale(1.1) rotate(1deg) translateY(12px);
  -moz-transform: scale(1.1) rotate(1deg) translateY(12px);
  -o-transform: scale(1.1) rotate(1deg) translateY(12px);
  -ms-transform: scale(1.1) rotate(1deg) translateY(12px);
  transform: scale(1.1) rotate(1deg) translateY(12px);
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}


.minimal_page_title {
    text-align: center;
}
.minimal_breadcrumb {
    min-height: 450px;
    padding-bottom: 50px;
    background-color: #eeeeee !important;
}

.home_minimal h1, .home_minimal h2, .home_minimal h3, .home_minimal h4, .home_minimal h5, .home_minimal h6 {
    color: #030a0b !important;
    font-family: "Jost", sans-serif;
}
.f2_breadcrumb_nav_wrap.mt-0 ul {
    justify-content: center;
}
.breadcrumb_nav a {
    color: #030a0b !important;
}
.breadcrumb_nav li {
    color: #030a0b;
    font-size: 14px;
    font-weight: 600;
    position: relative;
}
.breadcrumb_section {
    z-index: 1;
    min-height: 200px;
    position: relative;
    padding: 50px 0px 100px;
    padding-bottom: 40px;
}
ul.breadcrumb_nav.ul_li_center.clearfix li:last-child {
    color: red;
}
    </style>

<script>
    $(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
$(this).text(Math.ceil(now));
}
});
});

});
</script>
@endsection
