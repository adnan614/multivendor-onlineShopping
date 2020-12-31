<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order_product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class myAccountController extends Controller
{
    public function myAccount()
    {
       
        return view('frontend.layouts.myAccount');
    }

    public function editMyAccount()
    {
        return view('frontend.layouts.editMyAccount');
    }

    public function edit(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->role  = 'customer';

        $user->save();

         return redirect()->back()->with('message','Profile Updated Successfully!');
    }

    public function showOrder()
    {
         $id = auth()->user()->id;
          $orderT = Order::where('user_id',$id)->first();
          
          $orderShow = Order_product::where('order_id',$orderT->id)->get();
        return view('frontend.layouts.myOrder',compact('orderShow'));
          
    }
}