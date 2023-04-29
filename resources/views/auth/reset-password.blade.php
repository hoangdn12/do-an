@extends('frontend.main_master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Reset Password</li>
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
                        <h4 class="">Đặt lại mật khẩu </h4>


                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Địa chỉ Email của bạn <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Nhập mật khẩu mới <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Nhập lại mật khẩu <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                            </div>


                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Khôi phục mật khẩu</button>
                        </form>


                    </div>


        @include('frontend.body.brands')
</div>

@endsection





