<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Detail;
use App\Product;
use App\Order;

class GuestController extends Controller
{
    public function home(){  //show customers

        $customers = Customer::where('deleted', false)->get();
        $detail = Customer::find(1)->detail;
        return view('pages.home',compact('customers','detail'));
    }

    // CUSTOMERS
    public function customer($id){ //show customer

        $customer=Customer::findOrFail($id);
        return view('pages.customer',compact('customer'));
    }

    public function customerCreate(){

        return view('pages.customerCreate');
    }

    public function customerStore(Request $request){

        $validated=$request->validate([
            'name'=>'required|max:255',
            'billing'=>'required|max:255',
            'note'=>'required',
            'type'=>'required|boolean',
        ]);
        
        $customer=Customer::create($validated);
        $detail= Detail::make($validated);
        $detail->customer()->associate($customer);
        $detail->save();
        //dd($detail);
        return redirect()->route('homepage');
    }

    public function customerEdit($id){

        $customer=Customer::findOrFail($id);
        return view('pages.customerEdit',compact('customer'));
    }

    public function customerUpdate(Request $request, $id){

        $validated=$request->validate([
            'name'=>'required|max:255',
            'billing'=>'required|max:255',
            'note'=>'required',
            'type'=>'required|boolean'
        ]);
        
        // $customer = Customer::with('detail')->find($id);
        $customer=Customer::findOrFail($id);
        $customer->update($validated);
        // $customer->detail->note = $request->note;
        // $customer->detail->type = $request->type;
        // $customer->detail->update();
        
        //$customer->detail->save();
        //dd($customer->detail);
        $customer->detail->update($validated);

        return redirect()->route('homepage');
    }

    public function customerDelete($id){

        $customer=Customer::findOrFail($id);
        $customer->deleted = true;
        $customer->save();
        return redirect()->route('homepage');
    }

    // ORDERS
    public function order($id){

        $order=Order::findOrFail($id);
        return view('pages.order',compact('order'));
    }

    public function orderCreate($id){

        $customer=Customer::findOrFail($id);
        $products=Product::all();
        return view('pages.orderCreate',compact('customer','products'));
    }

    public function orderStore(Request $request,$id){

        $validated=$request->validate([
            'customer_id'=>'required|integer',
            'status'=>'required|boolean',
            'country'=>'required|max:255',
            'country'=>'required|max:255',
        ]);

        $customer=Customer::findOrFail($request->customer_id);
        $order=Order::make($validated);
        $order->customer()->associate($customer);
        $order->save();
        
        $products=Product::findOrFail($request->product_id);
        $order->products()->attach($products);
        $order->save();
        return redirect()->route('customer',$id);
    }

    public function orderProductDelete($orderId,$productId){

        $product = Product::findOrFail($productId);
        $order = Order::findOrFail($orderId);
        $order->products()->detach($product);
        $order->save();
        //dd($product,$order);
        return redirect()->route('order',$orderId);
    }

    public function orderEdit($id){

        $order=Order::findOrFail($id);
        $products=Product::all();

        return view('pages.orderEdit',compact('order','products'));
    }

    //PRODUCTS
    public function product($id){ //show product

        $product=Product::findOrFail($id);
        return view('pages.product',compact('product'));
    }
}
