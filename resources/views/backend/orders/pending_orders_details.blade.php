@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">CHI TIẾT ĐƠN HÀNG</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

								 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 
<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Thông tin người nhận hàng</strong> </h4>
				  </div>
				  

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
              <th> Số nhà, tên đường : </th>
               <th>{{ $order->street_id }} </th>
            </tr>

            <tr>
              <th> Quận/Phường/Huyện-xã : </th>
               <th> {{ $order->district_id }} </th>
            </tr>

             <tr>
              <th> Tỉnh/Thành phố : </th>
               <th> {{ $order->city_id }} </th>
            </tr>


            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Ngày đặt : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Chi tiết </strong><span class="text-danger"> hóa đơn : {{ $order->invoice_no }}</span></h4>
				  </div>
				   

<table class="table">
            <tr>
              <th>  Họ tên : </th>
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
               <th> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Tổng cộng : </th>
               <th>{{ number_format($order->amount) }} đ</th>
            </tr>

            <tr>
              <th> Trạng thái : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #008000;">{{ $order->status }} </span>
               </th>
            </tr>



            <tr>
                <th>
                    <?php
                        if ($order->return_order == '1') 
                        { 
                          echo "Lý do hoàn trả:"; 
                        } 
                    ?>
                </th>
                <th>
                    @if($order->return_reason != 'NULL')
                    <span class="text-danger">{{ $order->return_reason }} </span>
                    @endif
                </th>
            </tr>





            <tr>
               <th> 
                 
               	@if($order->status == 'chờ xác nhận')
               	<a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Xác nhận đơn hàng</a>

               	@elseif($order->status == 'xác nhận')
               	<a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Chờ lấy hàng đơn hàng</a>

               	@elseif($order->status == 'chờ lấy hàng')
               	<a href="{{ route('processing.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Đơn hàng đang giao</a>

               	@elseif($order->status == 'đang giao')
                <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Đơn hàng đã giao</a>

               	@endif
                 
                 </th>

                 <th>  
              @if($order->status == 'chờ xác nhận')
              <a href="{{ route('pending-cancel',$order->id) }}" class="btn btn-block btn-danger" id="cancel">Hủy bỏ đơn hàng</a>
              @endif
              </th>

              
            </tr>



          
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->





<div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					 
				  </div>



 <table class="table">
            <tbody>
  
              <tr>
                <td width="10%">
                  <label for=""> Hình ảnh</label>
                </td>

                 <td width="20%">
                  <label for=""> Tên sản phẩm </label>
                </td>

             <td width="10%">
                  <label for=""> Mã SKU </label>
                </td>


               <td width="10%">
                  <label for=""> Màu sắc </label>
                </td>

                <td width="10%">
                  <label for=""> Size </label>
                </td>

                  <td width="10%">
                  <label for=""> Số lượng </label>
                </td>

               <td width="10%">
                  <label for=""> Giá </label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->product->product_name }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->color }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->size }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">
                  <label for=""> {{ number_format($item->price) }} đ  ({{ number_format($item->price * $item->qty)}} đ ) </label>
                </td>
                
              </tr>
              @endforeach

            </tbody>
            
          </table>




				  
				</div>
			  </div>  <!--  // cod md -12 -->





		  </div>
		  <!-- /. end row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection