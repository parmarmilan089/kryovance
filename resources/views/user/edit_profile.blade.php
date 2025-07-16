<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')

<style>
    .error {color:red;}
</style>
 
    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Register</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3 color_black">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                            </button>
                            <span>{{ $message }}</span>
                        </div>
                        @endif
                        <form id="form_pre_eoi" method="POST" action="{{ route('update-register-user-profile') }}" >
                        {{ csrf_field() }}
                        
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> First Name: </label>
                                        <input type="text" class="form-control" placeholder="First Name" required="required" name="first_name"  value="{{$register_user->first_name}}" />
                                                  @if($errors->has('first_name'))
                                   <div class="error">{{ $errors->first('first_name') }}</div>
                                  @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Last Name: </label>
                                        <input type="text" class="form-control" placeholder="Last Name" required="required" name="last_name" value="{{$register_user->last_name}}" />
                                          @if($errors->has('last_name'))
                                   <div class="error">{{ $errors->first('last_name') }}</div>
                                  @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Mobile No: </label>
                                <input type="text" class="form-control" placeholder="Mobile No"   name="mobile_no" value="{{$register_user->mobile_no}}" disabled="" />
                                  @if($errors->has('mobile_no'))
                                   <div class="error">{{ $errors->first('mobile_no') }}</div>
                                  @endif
                            </div>
                            <div class="form-group">
                                <label>  Email:  </label>
                                <input type="email" class="form-control" placeholder="Email" required="required" name="email" value="{{$register_user->email}}"  disabled="" />
                                    @if($errors->has('email'))
                                   <div class="error">{{ $errors->first('email') }}</div>
                                  @endif
                            </div>
                           
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label>  Date of Birth:  </label>
                                       <input type="date" class="form-control"  required="required" name="birth_date" value="{{$register_user->birth_date}}" />
                                         @if($errors->has('birth_date'))
                                            <div class="error">{{ $errors->first('birth_date') }}</div>
                                         @endif
                                    </div>
                                </div>
                              
                              
                            </div>
                            <div class="form-group">
                                <label> School name: </label>
                                <textarea class="form-control" rows="3" placeholder="School name" required="required" name="school_name" >{{$register_user->school_name}}</textarea>
                                      @if($errors->has('school_name'))
                                   <div class="error">{{ $errors->first('school_name') }}</div>
                                  @endif
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <!-- <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p> -->
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Subscribe Now </small>
                        </div>
                    </div>
                    <!-- Newsletter End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection