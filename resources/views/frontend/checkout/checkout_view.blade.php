@extends('frontend.main_master')
@section('content')
@section('title')
Thanh toán
@endsection
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>Thanh toán</li>
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
            <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="col-md-8">
               <div class="panel-group checkout-steps" id="accordion">
                  <div class="panel panel-default checkout-step-01">
                     <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6 col-sm-6 already-registered-login">
                                 <h4 class="checkout-subtitle" ><b>THÔNG TIN NGƯỜI NHẬN</b></h4>
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Họ và tên</b><span>*</span></label>
                                       <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Email của bạn</b> <span>*</span></label>
                                       <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Số điện thoại của bạn</b> <span>*</span></label>
                                       <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Zipcode</b></label>
                                       <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder=" " >
                                    </div>
                                    <!-- // end form group  -->
                              </div>

                              <div class="col-md-6 col-sm-6 already-registered-login">
                                 <h4 class="checkout-subtitle" style="text-align: center"><b>ĐỊA CHỈ NHẬN HÀNG</b></h4>
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Tỉnh/Thành phố</b> <span>*</span></label>
                                       <input type="text" name="city_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="thành phố"  required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Quận/Phường/Huyện-xã</b> <span>*</span></label>
                                       <input type="text" name="district_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="quận,huyện,phường" required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Số nhà, tên đường</b><span>*</span></label>
                                       <input type="text" name="street_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="..."  required="">
                                    </div>
                                    <!-- // end form group  -->
                                    <div class="form-group">
                                       <label class="info-title" for="exampleInputEmail1"><b>Ghi chú</b></label>
                                       <textarea class="form-control" cols="30" rows="5" placeholder="..." name="notes"></textarea>
                                    </div>
                                    <!-- // end form group  -->
                              </div>

                    
                           </div>
                        </div>

                        
                     </div>

                  </div>
               </div>


            </div>

            
            <div class="col-md-4">
               <!-- checkout-progress-sidebar -->
               <div class="checkout-progress-sidebar ">
                  <div class="panel-group">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="unicase-checkout-title">ĐƠN HÀNG CỦA BẠN</h4>
                        </div>

                        <div class="">
                           <ul class="nav nav-checkout-progress list-unstyled">
                              @foreach($carts as $item)
                              <li> 
                                 <strong>Số lượng: </strong>
                                 ( {{ $item->qty }} )
                                 <strong>Màu sắc: </strong>
                                 {{ $item->options->color }}
                                 <strong>Size: </strong>
                                 {{ $item->options->size }}
                              </li>
                              <li> 
                                 <strong>Hình ảnh: </strong>
                                 <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;" >
                              </li>
                              <hr>
                              @endforeach 

                              <hr>

                              <li>
                                 @if(Session::has('coupon'))
                                    <strong>Tạm tính : </strong> {{ number_format($cartTotal) }} đ
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

            <div class="col-md-4">
               <div class="checkout-progress-sidebar ">
                  <div class="panel-group">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="unicase-checkout-title">PHƯƠNG THỨC THANH TOÁN</h4>
                        </div>

                        <div class="pay-top sin-payment">
                           <input id="payment_method_1" class="input-radio" type="radio" value="card"  name="payment_method">
                           <label for="payment_method_1"> Chuyển khoản ngân hàng </label>
                           <div class="payment-box payment_method_bacs">
                              <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng ghi mã đơn hàng của bạn vào nội dung thanh toán.</p>
                           </div>
                        </div>

                        <div class="pay-top sin-payment">
                           <input id="payment-method-2" class="input-radio" type="radio" value="cash" checked="checked" name="payment_method">
                           <label for="payment-method-2">Thanh toán khi giao hàng </label>
                           <div class="payment-box payment_method_bacs">
                              <p>Trả tiền mặt khi nhận được hàng.</p>
                           </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">THANH TOÁN</button>
                     </div>
                  </div>
               </div>
            </div>
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