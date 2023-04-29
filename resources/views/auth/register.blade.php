@extends('frontend.main_master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Đăng nhập và đăng kí</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Đăng nhập tài khoản của bạn</h4>

                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email của bạn<span>*</span></label>
                                <input type="text" id="email" name="email" class="form-control unicase-form-control text-input">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Nhớ tài khoản!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Quên mật khẩu?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Tạo tài khoản mới</h4>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Họ và tên <span>*</span></label>
                                <input type="text" id="name" name="name" class="form-control unicase-form-control text-input">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Địa chỉ Email của bạn <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Số điện thoại của bạn<span>*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Nhập lại mật khẩu<span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng kí</button>
                        </form>


                    </div>
                </div>
            </div><!-- /.sigin-in-->


            @include('frontend.body.brands')

        </div><!-- /.body-content -->






@endsection





