<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            
        }
        else{
            return redirect('login');
        }
        
        
    }

    public function uploadproduct(request $request)
    {
       

        $filePath = null;
       $data = new product; 
       if($request->hasFile('product_file')) {
        $image      = $request->file('product_file');
        $fileName   = time() . '.' . $image->getClientOriginalExtension(); 
        $filePath = $request->file('product_file')->store('productimage');
       }
       $data->image = $filePath;
       $data->title = $request->title;
       $data->price = $request->price;
       $data->description = $request->des;
       $data->quantity = $request->quantity;
       $data->save();

       return redirect()->back()->with('message','Product Added Successfully');
    }
   
    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }
    public function deleteproduct($id)
    {
       $data=product::find($id);
       $data->delete();
       return redirect()->back()->with('message','Product Deleted Successfully'); 
    }
    public function updateview($id)
    {
       $data=product::find($id);
       return view('admin.updateview',compact('data')); 
    }
    public function updateproduct(Request $request , $id)
    {
        $data=product::find($id);
        if($request->hasFile('product_file')) {
            $image      = $request->file('product_file');
            $fileName   = time() . '.' . $image->getClientOriginalExtension(); 
            $filePath = $request->file('product_file')->store('productimage');
           }
           $data->image = $filePath;
           $data->title = $request->title;
           $data->price = $request->price;
           $data->description = $request->des;
           $data->quantity = $request->quantity;
           $data->save();
    
           return redirect()->back()->with('message','Product Updated Successfully');

    }
    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder',compact('order'));
    }
    public function updatestatus($id)
    {
        $order=order::find($id);
        $order->status='Delivered';
        $order->save();
        return redirect()->back();
    }
}
