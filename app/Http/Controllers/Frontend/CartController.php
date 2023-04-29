<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
// thêm vào giỏ hàng
    public function AddToCart(Request $request, $id){
		if (Session::has('coupon')) {
			Session::forget('coupon');
		 }
 
    	$product = Product::findOrFail($id);
    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->selling_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);

    	}else{
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->discount_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
    	}

    }


	
// Mini Cart Section
	   public function AddMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));
    } 



/// xóa item ở mini cart 
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Xóa khỏi giỏ hàng thành công']);

    }

//thêm vào danh sách yêu thích
	public function AddToWishlist(Request $request, $product_id){
		if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

			if (!$exists) {
				Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Thêm vào yêu thích thành công']);

		}else{
			return response()->json(['error' => 'Sản phẩm này bạn đã thêm vào yêu thích']);
		}   

        }else{
            return response()->json(['error' => 'Vui lòng đăng nhập tài khoản của bạn']);
        }

    } 




	public function CouponApply(Request $request){
		$coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
		if ($coupon) {
			Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
			]);

            return response()->json(array(
				'validity' => true,
                'success' => 'Áp dụng mã giảm giá thành công'
            ));


		}else{
			return response()->json(['error' => 'Mã giảm giá không hợp lệ']);
		}

    }



	public function CouponCalculation(){
		if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    }




// button xóa mã giảm giá 
	public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Đã xóa thành công']);


    }

	


// Thanh toán checkout
	public function CheckoutCreate(){
		if (Auth::check()) {
		if (Cart::total() > 0) {
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();

		return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
			}else{
			$notification = array(
			'message' => 'Giỏ hàng của bạn trống',
			'alert-type' => 'error'
		);

		return redirect()->to('/')->with($notification);
			}

		}else{
			$notification = array(
			'message' => 'Vui lòng đăng nhập tài khoản của bạn',
			'alert-type' => 'error'
		);

		return redirect()->route('login')->with($notification);

		}
	}











}
