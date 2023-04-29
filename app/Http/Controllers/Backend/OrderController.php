<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;
 

class OrderController extends Controller
{
    // Pending Orders 
	public function PendingOrders(){
		$orders = Order::where('status','chờ xác nhận')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} 



    // Pending Order Details 
	public function PendingOrdersDetails($order_id){

		$order = Order::with('user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} 



    // xác nhận Orders 
	public function ConfirmedOrders(){
		$orders = Order::where('status','xác nhận')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} 


	// chờ lấy hàng Orders
	public function ProcessingOrders(){
		$orders = Order::where('status','chờ lấy hàng')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	}


    // Orders đang giao 
	public function ShippedOrders(){
		$orders = Order::where('status','đang giao')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} 


    // Orders đã giao 
	public function DeliveredOrders(){
		$orders = Order::where('status','đã giao')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	}


    // hủy Orders
	public function CancelOrders(){
		$orders = Order::where('status','đã hủy')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	}


	

	public function PendingToConfirm($order_id){
		Order::findOrFail($order_id)->update(['status' => 'xác nhận']);
		$notification = array(
			  'message' => 'Đơn hàng đã xác nhận',
			  'alert-type' => 'success'
		  );
		  return redirect()->route('pending-orders')->with($notification);
	  } 
  


  	public function PendingToCancel($order_id){
		Order::findOrFail($order_id)->update(['status' => 'đã hủy']);
		$notification = array(
			  'message' => 'Đã hủy bỏ đơn hàng',
			  'alert-type' => 'success'
		  );
		  return redirect()->route('cancel-orders')->with($notification);
	  } 
  


  
	  public function ConfirmToProcessing($order_id){
		Order::findOrFail($order_id)->update(['status' => 'chờ lấy hàng']);
		$notification = array(
			  'message' => 'Đơn hàng đang xử lý',
			  'alert-type' => 'success'
		  );
		  return redirect()->route('confirmed-orders')->with($notification);
	  }
  
  
  
	public function ProcessingToShipped($order_id){
		Order::findOrFail($order_id)->update(['status' => 'đang giao']);
		$notification = array(
			  'message' => 'Đơn hàng đang giao',
			  'alert-type' => 'success'
		  );
		  return redirect()->route('processing-orders')->with($notification);
	  }
	  
  


	  
	   public function ShippedToDelivered($order_id){
	   $product = OrderItem::where('order_id',$order_id)->get();
	   foreach ($product as $item) {
		   Product::where('id',$item->product_id)
				   ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	   } 
   
		Order::findOrFail($order_id)->update(['status' => 'đã giao']);
		$notification = array(
			  'message' => 'Đơn hàng đã giao hoàn tất',
			  'alert-type' => 'success'
		  );
		  return redirect()->route('shipped-orders')->with($notification);
	  } 
  
  
	  public function AdminInvoiceDownload($order_id){
		  $order = Order::with('user')->where('id',$order_id)->first();
		  $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
		  $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				  'tempDir' => public_path(),
				  'chroot' => public_path(),
		  ]);
		  return $pdf->download('hóa đơn.pdf', 'UTF-8');
  
	  }
  


}
