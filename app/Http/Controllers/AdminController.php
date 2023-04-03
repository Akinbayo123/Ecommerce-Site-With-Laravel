<?php

namespace App\Http\Controllers;

use PDF;
use Stripe\Order;
use App\Models\Orders;
use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    //
    public function view()
    {
        if (Auth::user()->usertype == '1'){
            $data = Category::get();
            return view('admin.add_category', compact('data'));
        }
       return back();
    }
    public function submit_category(Request $request)
    {
        if (Auth::user()->usertype == '1'){
            $formFields = $request->validate([
                'product_category' => 'required',
            ]);
            Category::create($formFields);
            return back();
        }
       return back();
        
    }
    public function delete_cat(Category $id)
    {

        if (Auth::user()->usertype == '1'){
            $id->delete();
            return back();
        }
       return back();
        
      
    }
    public function add_product()
    {
        if (Auth::user()->usertype == '1'){
            $data = Category::get();
            return view('admin.add_product', compact('data'));
        }
       return back();
    }

    public function add_products(Request $request)
    {
        if (Auth::user()->usertype == '1'){
            $formFields = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'quantity' => 'required',
                'price' => 'required'
            ]);
            //dd(filesize())
            if($request->discount){
                $formFields['discount']= $request->discount;
            }
           
    
            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('product_image', 'public');
            }
            Product::create($formFields);
    
            return back();
        }
       return back();
    }
    public function show_product()
    {
        if (Auth::user()->usertype == '1'){
            $data = Product::get();
            return view('admin.show_product', compact('data'));
        }
       return back();
       
    }

    public function edit_pro(Product $id)
    {
     if (Auth::user()->usertype == '1'){
           $datas = Category::get('product_category');
        return view('admin.edit_pro', compact('datas', 'id'));
        }
       return back();
    }

    public function edit_pros(Request $request, Product $id)
    {
        if (Auth::user()->usertype == '1'){
          
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('product_image', 'public');
        }
        $id->update($formFields);
        return back();
         }
        return back();
    }
    public function delete_pro(Product $id)
    {
        if (Auth::user()->usertype == '1'){
            $id->delete();
            return back();
         }
        return back();    
    }
    public function orders()
    {
        if (Auth::user()->usertype == '1'){
            $data = Orders::orderby('user_id', 'asc')->latest()->filter(request(['search']))->get();
            return view('admin.orders', compact('data'));
         }
        return back();  
    }
    public function order_delivered(Orders $order)
    {
        if (Auth::user()->usertype == '1'){
            $order->delivery_status = "Delivered";
            $order->payment_status = "Received";
            $order->save();
            return back();
         }
        return back(); 
    }
    public function print_pdf(Orders $order)
    {
        if (Auth::user()->usertype == '1'){
            $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
         }
         return back();
       
    }
   
}
