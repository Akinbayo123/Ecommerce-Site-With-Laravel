<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Stripe\Order;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data = Product::where('quantity','>','0')->filter(request(['search']))->paginate(6);
        return view('home.userpage', compact('data'));
    }


    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $product = auth()->user()->product_cart()->get();
                $data = Product::where('quantity','>','0')->filter(request(['search']))->paginate(6);
                return view('home.userpage', compact('data', 'product'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }
    public function details(Product $products)
    {
        if (Auth::id()) {
            $product = auth()->user()->product_cart()->get();
            return view("home.product_details", compact('products', 'product'));
        }


        return view("home.product_details", compact('products'));
    }

    public function add_cart(Request $request, Product $product)
    {
        $cart = Cart::where('product_id', $product->id)->where('user_id', Auth::id())->get('id')->first();

        if (Auth::id()) {
            if ($cart == NULL) {
                $user = Auth::user();
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->address = $user->address;
                $cart->phone = $user->phone;
                $cart->user_id = $user->id;
                $cart->title = $product->title;
                if ($product->discount == NULL) {
                    $cart->price = $product->price * $request->quantity;
                } else {
                    $cart->price = $product->discount * $request->quantity;
                }

                $cart->quantity = $request->quantity;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->save();


                return back();
            } else {
                return back();
            }
        } else {
            return redirect("/login");
        }
    }
    public function cart()
    {
        $product = auth()->user()->product_cart()->get();
        return view('home.cart', compact('product'));
    }
    public function remove_cart(Cart $id)
    {
        $id->delete();
        return back();
    }
    public function update_cart(Request $request, Cart $product)
    {
        $data = Product::where('id', $product->product_id)->get();
        $product->quantity = $request->quant;
        foreach ($data as $datas) {
            if ($datas->discount == NULL) {
                $product->price = $datas->price * $request->quant;
            } else {
                $product->price = $datas->discount * $request->quant;
            }
        }

        $product->save();
        return redirect()->back();
    }
    public function cash_pay()
    {
        $data = Cart::where('user_id', Auth::id())->get();
        foreach ($data as $datas) {
            $order = new Orders;
            $order->name = $datas->name;
            $order->email = $datas->email;
            $order->phone = $datas->phone;
            $order->address = $datas->address;
            $order->user_id = $datas->user_id;
            $order->title = $datas->title;
            $order->quantity = $datas->quantity;
            $order->price = $datas->price;
            $order->image = $datas->image;
            $order->product_id = $datas->product_id;
            $order->payment_status = "Cash on delivery";
            $order->delivery_status = "Processing";
            $order->save();

            $product_i = $datas->product_id;
            $products = Product::find($product_i);
            $products->quantity = $products->quantity - $datas->quantity;
            $products->save();

            $cart_id = $datas->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return back();
    }
    public function card_pay($total_price)
    {
        return view('home.stripe', compact('total_price'));
    }

    public function stripePost(Request $request, $total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
            "address" => [
                "line1" => "Virani Chowk",
                "postal_code" => "360001",
                "city" => "Rajkot",
                "state" => "GJ",
                "country" => "IN",
            ],
            "email" => "demo@gmail.com",
            "name" => "Hardik Savani",
            "source" => $request->stripeToken
        ));
        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Test payment from itsolutionstuff.com.",
            "shipping" => [
                "name" => "Jenny Rosen",
                "address" => [
                    "line1" => "510 Townsend St",
                    "postal_code" => "98140",
                    "city" => "San Francisco",
                    "state" => "CA",
                    "country" => "US",
                ],
            ]
        ]);

        $data = Cart::where('user_id', Auth::id())->get();
        foreach ($data as $datas) {
            $order = new Orders;
            $order->name = $datas->name;
            $order->email = $datas->email;
            $order->phone = $datas->phone;
            $order->address = $datas->address;
            $order->user_id = $datas->user_id;
            $order->title = $datas->title;
            $order->quantity = $datas->quantity;
            $order->price = $datas->price;
            $order->image = $datas->image;
            $order->product_id = $datas->product_id;
            $order->payment_status = "Received";
            $order->delivery_status = "Processing";
            $order->save();

            $product_i = $datas->product_id;
            $products = Product::find($product_i);
            $products->quantity = $products->quantity - $datas->quantity;
            $products->save();

            $cart_id = $datas->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');
        return back();
    }
    public function my_orders()
    {
        $product = auth()->user()->product_cart()->get();
        $order = auth()->user()->orders()->get();

        return view('home.my_orders', compact('product', 'order'));;
    }

    public function cancel(Orders $id)
    {
        $id->delivery_status = "Cancelled";
        $id->payment_status = "Cancelled";
        $id->save();

        return back();
    }
}
