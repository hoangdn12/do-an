@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       <div class="col-md-2">
       </div>

       <div class="col-md-10">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Ngày</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Tổng cộng</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Thanh toán</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Hóa đơn</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Tình trạng</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Hành động </label>
                </td>
                
              </tr>


              @forelse($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ number_format($order->amount) }} đ</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> 
                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>

                    </label>
                </td>

         <td class="col-md-1">
          <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Xem</a>

           <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Hóa đơn </a>
          
        </td>
                
              </tr>

              @empty
              <h2 class="text-danger">Không có đơn hàng nào</h2>

              @endforelse





            </tbody>
            
          </table>
          
        </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection