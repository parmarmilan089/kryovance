<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
    <!-- main body - start
    ================================================== -->
    <main>

        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="public/user/assets/images/breadcrumb/bg_01.jpg">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Register Page</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
                    <li>Pages</li>
                    <li>Register</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- register_section - start
        ================================================== -->
        <section class="register_section sec_ptb_140 parallaxie clearfix" data-background="public/user/assets/images/backgrounds/bg_23.jpg">
            <div class="container">
                <div class="reg_form_wrap signup_form" data-background="">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="reg_form">
                            <h2 class="form_title text-uppercase">Register</h2>
                            <div class="form_item">
                                <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
                                @error('firstname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
                                @error('lastname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="text" name="company" placeholder="Company Name" value="{{ old('company') }}">
                                @error('company')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="tel" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="password" name="password" placeholder="Password">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="checkbox_item mb_30">
                                <label for="agree_checkbox"><input id="agree_checkbox" type="checkbox"> I agree to the Terms of User</label>
                            </div>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">Create Account</button>

                            <div class="create_account text-center">
                                <h4 class="small_title_text text-center text-uppercase">Have not account yet?</h4>
                                <a class="create_account_btn text-uppercase" href="{{route('user-login')}}">Login</a>
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
.form_item {
    position: relative;
    margin-bottom: 15px;
}
</style>

@endsection
