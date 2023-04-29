@extends('frontend.main_master')
@section('content')
<div class="body-content">
   <div class="container">
      <div class="row">
         @include('frontend.common.user_sidebar')
         <div class="col-md-5">
            <div class="card">
               <div class="card-header">
                  <h4>CHI TIẾT VẬN CHUYỂN</h4>
               </div>
               <hr>
               <div class="card-body" style="background: #E9EBEC;">
                  <table class="table">
                     <tr>
                        <th> Họ tên : </th>
                        <th> {{ $order->name }} </th>
                     </tr>
                     <tr>
                        <th> Số điện thoại : </th>
                        <th> {{ $order->phone }} </th>
                     </tr>
                     <tr>
                        <th> Email : </th>
                        <th> {{ $order->email }} </th>
                     </tr>
                     <tr>
                        <th> Tỉnh/Thành phố : </th>
                        <th> {{ $order->city_id }} </th>
                     </tr>
                     <tr>
                        <th> Quận/Phường/Huyện-xã : </th>
                        <th> {{ $order->district_id }} </th>
                     </tr>
                     <tr>
                        <th> Số nhà, tên đường : </th>
                        <th>{{ $order->street_id }} </th>
                     </tr>
                     <tr>
                        <th> Post Code : </th>
                        <th> {{ $order->post_code }} </th>
                     </tr>
                     <tr>
                        <th> Ngày mua hàng : </th>
                        <th> {{ $order->order_date }} </th>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <!-- // end col md -5 -->
         <div class="col-md-5">
            <div class="card">
               <div class="card-header">
                  <h4>CHI TIẾT ĐƠN HÀNG
                     <span class="text-danger"> Hóa đơn : {{ $order->invoice_no }}</span>
                  </h4>
               </div>
               <hr>
               <div class="card-body" style="background: #E9EBEC;">
                  <table class="table">
                     <tr>
                        <th>  Tên : </th>
                        <th> {{ $order->user->name }} </th>
                     </tr>
                     <tr>
                        <th>  Số điện thoại : </th>
                        <th> {{ $order->user->phone }} </th>
                     </tr>
                     <tr>
                        <th> Thanh toán : </th>
                        <th> {{ $order->payment_method }} </th>
                     </tr>
                     <tr>
                        <th> Hóa đơn  : </th>
                        <th class="text-danger"> {{ $order->invoice_no }} </th>
                     </tr>
                     <tr>
                        <th> Tổng tiền đơn hàng : </th>
                        <th>{{ number_format($order->amount) }} đ</th>
                     </tr>
                     <tr>
                        <th> Trạng thái đơn hàng : </th>
                        <th>   
                           <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> 
                        </th>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <!-- // 2ND end col md -5 -->
         <div class="row">
            <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table">
                     <tbody>
                        <tr style="background: #e2e2e2;">
                           <td class="col-md-2">
                              <label for=""> Hình ảnh</label>
                           </td>
                           <td class="col-md-3">
                              <label for=""> Tên sản phẩm </label>
                           </td>
                           <td class="col-md-2">
                              <label for=""> SKU sản phẩm</label>
                           </td>
                           <td class="col-md-2">
                              <label for=""> Màu sắc </label>
                           </td>
                           <td class="col-md-2">
                              <label for=""> Size </label>
                           </td>
                           <td class="col-md-1">
                              <label for=""> Số lượng </label>
                           </td>
                           <td class="col-md-1">
                              <label for=""> Giá </label>
                           </td>
                        </tr>
                        @foreach($orderItem as $item)
                        <tr>
                           <td class="col-md-1">
                              <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                           </td>
                           <td class="col-md-3">
                              <label for=""> {{ $item->product->product_name }}</label>
                           </td>
                           <td class="col-md-3">
                              <label for=""> {{ $item->product->product_code }}</label>
                           </td>
                           <td class="col-md-2">
                              <label for=""> {{ $item->color }}</label>
                           </td>
                           <td class="col-md-1">
                              <label for=""> {{ $item->size }}</label>
                           </td>
                           <td class="col-md-2">
                              <label for=""> {{ $item->qty }}</label>
                           </td>
                           <td class="col-md-3">
                              <label for=""> {{ number_format($item->price) }}đ  ({{ number_format($item->price * $item->qty) }}đ)</label>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- / end col md 8 -->
         </div>
         <!-- // END ORDER ITEM ROW -->



         @if($order->status !== "đã giao")
            @else
               @php
                  $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
               @endphp
                  @if($order)
                     <form action="{{ route('return.order',$order->id) }}" method="post">
                        @csrf
                           <div class="form-group">
                                <label for="label"> Lý do trả lại đơn hàng:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Hoàn trả đơn hàng</button>
                     </form>
                    @else
                        <span class="badge badge-pill badge-warning" style="background: red">Bạn đã gửi yêu cầu trả lại cho sản phẩm này</span>
               @endif
         @endif
                <br><br>




      </div>
   </div>
   <!-- // end row -->
</div>
@endsection