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
                <h1 class="page_title text-white">Terms and Conditions</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Terms and Conditions</li>
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
            <div class="col-md-12">
                <div class="whyMainContent">
                    <span class="whySubtitle bg-primary-opacity">
                        Kryovance
                    </span>
                    <h2 class="Whytitle">
                        "Terms and Conditions"
                    </h2>
                    <p>
                        Welcome to Kryovance, a brand of Stormlight Synergies Pvt Ltd (SLS). By using our website, you agree to the following terms:
                    </p>
                    <p>All product listings, prices, and availability are subject to change without prior notice.</p>
                    <p>Orders placed are subject to acceptance and stock availability.</p>
                    <p>Payments must be made via approved payment methods. Intellectual property, including content, images, and trademarks on <a href="Kryovance.com">Kryovance.com</a>, remains the property of SLS.</p>
                    <p>
                      Unauthorized use of this website may give rise to a claim for damages.

                    </p>
                    <p>
                      For any clarifications, please contact us at sales@slsyn.com.
                    </p>
                    
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
        
        <!-- main_contact_section - end
        
        ================================================== -->
        <!-- main_contact_section - end
        ================================================== -->
    </main>
    <!-- main body - end
    ================================================== -->

        <style>

            .whyFlex .whyMainContent {
    width: 100%;
}
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
