@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Danh sách yêu cầu hoàn trả</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Ngày </th>
								<th>Hóa đơn </th>
								<th>Tổng cộng </th>
								<th>Thanh toán </th>
								<th>Trạng thái </th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
	 @foreach($orders as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		<td> {{ number_format($item->amount) }} đ </td>

		<td> {{ $item->payment_method }}  </td>
		<td>
		@if($item->return_order == 1)
      <span class="badge badge-pill badge-danger">yêu cầu hoàn trả hàng </span>
       @elseif($item->return_order == 2)
       <span class="badge badge-pill badge-success">Thành công </span>
		@endif

		  </td>


		<td width="25%">
		<a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
  		<a href="{{ route('return.approve',$item->id) }}" class="btn btn-danger">Chấp nhận </a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection