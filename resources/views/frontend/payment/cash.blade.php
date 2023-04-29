@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
Thanh toán
@endsection
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>Xác nhận thanh toán</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb --> 
<div class="body-content">
   <div class="container">
      <div class="checkout-box ">
         <div class="row">
            <div class="col-md-6">
               <!-- checkout-progress-sidebar -->
               <div class="checkout-progress-sidebar ">
                  <div class="panel-group">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="unicase-checkout-title">Xác nhận thanh toán của đơn hàng bạn </h4>
                        </div>
                        <div class="">
                           <ul class="nav nav-checkout-progress list-unstyled">
                              <hr>
                              <li>
                                 @if(Session::has('coupon'))
                                 <strong>Tạm tính: </strong> {{ number_format($cartTotal) }} đ
                                 <hr>
                                 <strong>Mã giảm giá : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                 ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                 <hr>
                                 <strong>Chiết khấu : </strong> {{ number_format(session()->get('coupon')['discount_amount']) }} đ
                                 <hr>
                                 <strong>Tổng cộng : </strong> {{ number_format(session()->get('coupon')['total_amount']) }} đ
                                 <hr>
                                 @else
                                 <strong>Tạm tính : </strong> {{ number_format($cartTotal) }} đ
                                 <hr>
                                 <strong>Tổng cộng : </strong> {{ number_format($cartTotal) }} đ
                                 <hr>
                                 @endif 
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- checkout-progress-sidebar -->
            </div>
            <!--  // end col md 6 -->
            <div class="col-md-6">
               <!-- checkout-progress-sidebar -->
               <div class="checkout-progress-sidebar ">
                  <div class="panel-group">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="unicase-checkout-title">Phương thức thanh toán</h4>
                        </div>
                        <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                           @csrf
                           <div class="form-row">
                              <!-- <img src="{{ asset('frontend/assets/images/payments/cash.png') }}"> -->
                              <label for="payment-method-2">Thanh toán khi giao hàng </label>
                           <div class="payment-box payment_method_bacs">
                              <p>Trả tiền mặt khi nhận được hàng.</p>
                           </div>
                              <label for="card-element">
                              <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                              <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                              <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                              <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                              <input type="hidden" name="city_id" value="{{ $data['city_id'] }}">
                              <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                              <input type="hidden" name="street_id" value="{{ $data['street_id'] }}">
                              <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
                              </label>
                           </div>
                           <br>
                           <button class="btn btn-primary">XÁC NHẬN THANH TOÁN NGAY</button>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- checkout-progress-sidebar -->
            </div>
            <!--  // end col md 6 -->
            </form>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.checkout-box -->
   </div>
   <!-- /.container -->
</div>
<!-- /.body-content -->
@endsection