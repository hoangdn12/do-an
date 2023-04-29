@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

                <div class="col-md-2">

                </div> <!-- // end col md 2 -->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Xin chào </span><strong>{{ Auth::user()->name }}</strong> đến chỉnh sửa thông tin</h3>

                        <div class="card-body">



                            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Tên của bạn <span> </span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Địa chỉ Email <span> </span></label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>


                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Số điện thoại của bạn <span> </span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Hình ảnh<span> </span></label>
                                    <input type="file" name="profile_photo_path" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
