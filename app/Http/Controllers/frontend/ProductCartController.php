<?php

namespace App\Http\Controllers\frontend;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCartController extends Controller
{
    public function cart(){
        return view('frontend.product_cart.product_cart');
    }
    public function addtocart($id){
        
        $product=Product::find($id);
        
        $cart=session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['product_quantity']++;
        }else{
            $cart[$id]=[
                    'product_title'    => $product->product_title,
                    'discount_price'   => $product->discount_price,
                    'product_price'    => $product->price,
                    'product_quantity' => 1,
                    'image'            => $product->image
            ];
        }
       
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function updateCart(Request $request){
        if($request->id && $request->product_quantity){
            $cart=session()->get('cart');
            $cart[$request->id]["product_quantity"]=$request->product_quantity;
            session()->put('cart',$cart);
            return redirect()->back()->with('success', 'Product update cart successfully!');
        }

    }
    public function  deleteCart(Request $request){
        if($request->id){
            $cart=session()->get('cart');
           if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            session()->put('cart',$cart);
           }
           return redirect()->back()->with('success', 'Product delete cart successfully!');
            
        }
    }
    public function stripe($totalprice){
        return view('frontend.stripe.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {   
        
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount"      => $totalprice * 100,
                "currency"    => "USD",
                "source"      => $request->stripeToken,
                "description" => "Test Charge"
        ]);
        session()->get('cart',[]);
        session()->forget('cart');
        return redirect()->back()->with('success', 'Payment Successfull!');
    }

}