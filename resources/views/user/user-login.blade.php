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
            <div class="overlay" data-bg-color="#eeeeee"></div>
            <div class="container">
                <h1 class="page_title text-white">Login Page</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- register_section - start
        ================================================== -->
        <section class="register_section sec_ptb_140 has_overlay parallaxie clearfix" data-background="{{asset('user/assets/images/backgrounds/bg_22.jpg')}}">
            <div class="overlay" data-bg-color="rgba(55, 55, 55, 0.75)"></div>
            <div class="container">
                <div class="reg_form_wrap login_form" >

                    <form action="{{ route('customer.login') }}" method="POST">
                        @csrf
                        <div class="reg_form">
                            <h2 class="form_title text-uppercase text-center">Login</h2>
                            <div class="form_item">
                                <input id="username_input" type="email" name="email" placeholder="email">
                                <label for="username_input"><i class="fal fa-user"></i></label>
                            </div>
                            <div class="form_item">
                                <input id="password_input" type="password" name="password" placeholder="password">
                                <label for="password_input"><i class="fal fa-unlock-alt"></i></label>
                            </div>
                            <a class="forget_pass text-uppercase mb_30" href="{{route('forget-password')}}">Forgot password?</a>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">Login</button>
                            @if(session('success'))
                            <div class="alert alert-success">
                                <p class="text-center">{{ session('success') }}</p>
                            </div>
                            @endif
                            @if ($errors->any())
                                <div style="color: red;">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div class="create_account text-center">
                                <h4 class="small_title_text text-center text-uppercase">Have not account yet?</h4>
                                <!-- <a class="create_account_btn text-uppercase" href="{{route('user-register')}}">Sign Up</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- register_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

<style>
/*    section.breadcrumb_section.text-white.text-center.text-uppercase.d-flex.align-items-end.clearfix {*/
/*    background-image: none !important;*/
/*}*/
      .breadcrumb_section {
    z-index: 1;
    min-height: 350px;
    position: relative;
    padding: 100px 0px;
    padding-bottom: 40px;
}
.sec_ptb_140 {
    padding: 80px 0px;
}
.reg_form_wrap .reg_form {
    max-width: 100%;
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

.reg_form_wrap {
    margin: auto;
    max-width: 800px;
    border-radius: 4px;
    padding: 40px 100px;
    background-size: 100%;
    background-color: #f0f2f1;
}
ul.breadcrumb_nav.ul_li_center.clearfix li:last-child {
    color: red;
}
section.register_section.sec_ptb_140.has_overlay.parallaxie.clearfix {
    background: #fff;
    background-image: none !important;
}

section.register_section.sec_ptb_140.has_overlay.parallaxie.clearfix .overlay {
    opacity: 0;
}
</style>
@endsection
