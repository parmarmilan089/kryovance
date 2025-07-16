<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->
    <main>
        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="{{asset('user/assets/images/breadcrumb/bg_01.jpg')}}">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Reset Password</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
                    <li>Pages</li>
                    <li>Reset Password</li>
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

                    <form action="{{ route('customer.reset.password.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="reg_form">
                            <h2 class="form_title text-uppercase text-center">Reset Password</h2>
                            <div class="form_item">
                                <input id="password_input" type="password" name="password" placeholder="password">
                                <label for="password_input"><i class="fal fa-unlock-alt"></i></label>
                            </div>
                            <div class="form_item">
                                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                                <label for="password_input"><i class="fal fa-unlock-alt"></i></label>
                            </div>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">Submit</button>
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
                            {{--  <div class="create_account text-center">
                                <h4 class="small_title_text text-center text-uppercase">Have not account yet?</h4>
                                <a class="create_account_btn text-uppercase" href="{{route('user-register')}}">Sign Up</a>
                            </div>  --}}
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
</style>
@endsection
