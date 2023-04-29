<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;

class Checkoutcontroller extends Controller
{
    public function CheckoutStore(Request $request){
        // dd($request->all());
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['city_id'] = $request->city_id;
    	$data['district_id'] = $request->district_id;
    	$data['street_id'] = $request->street_id;
    	$data['notes'] = $request->notes;
        $cartTotal = Cart::total();

    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
    	}

   
   


	}











}