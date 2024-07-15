<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

     /**
     * main website page.
     */
    public function index()
    {
        $user =User ::where('usertype','user')->get()->count();
        $product= Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->get()->count();
        $users=User::all();
        return view('admin.index',compact('user','product','order','delivered','users'));
    }

     /**
     * home page.
     */
    public function home()
    {
        $product=Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid =$user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count='';
        }
        return view('home.index', compact('product','count'));
    }

     /**
     * login home.
     */
    public function login_home()
    {
        $product=Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid =$user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count='';
        }
        return view('home.index', compact('product','count'));
    }

     /**
     * Product details.
     */
    public function product_details($id) 
    {
        $data = Product::find($id);
        if (Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else{
            $count = '';
        }
        $product = Product::all(); // Get all products
        return view('home.product_details', compact('data', 'count', 'product')); // Pass the data to the view
    }

     /**
     * add cart.
     */
    public function add_cart($id)
    {
        $product_id =$id;
        $user =Auth::user();
        $user_id = $user->id;
        $data =new Cart;
        $data->user_id= $user_id;
        $data->product_id= $product_id;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product added the cart');
        return redirect()-> back();
    }

    /**
     * my cart.
     */
    public function mycart(){
        if(Auth::id()){
            $user=Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }

     /**
     * delete cart.
     */
    public function delete_cart($id)
    {
        $data=Cart::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addsuccess('Product remove from cart');
        return redirect()->back();
    }

     /**
     * shoping page.
     */
    public function shoping_page()
    {
        $product=Product::paginate(12);
        if(Auth::id()){
            $user=Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            return view('home.shoping_page', compact('product','count'));
        }
        return view('home.shoping_page', compact('product'));
    }

     /**
     * contact.
     */
    public function contact()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            return view('home.contact', compact('count'));
        }
        return view('home.contact');
    }

     /**
     * confrim order.
     */
    public function confirm_order(Request $request )
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addsuccess('Product ordered successfully');
        return redirect()->back(); 
    }

     /**
     *my order.
     */
    public function myorder()
    {
        $user =Auth::user()->id;
        $count = Cart::where('user_id',$user)->get()->count();
        $order =Order::where('user_id',$user)->get();
        return view('home.order',compact('count','order'));
    }

     /**
     * stripe.
     */
    public function stripe($totalValue)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.stripe',compact('totalValue','count'));
    }

     /**
     * stripepost.
     */
    public function stripePost(Request $request,$totalValue)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalValue * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        $name = Auth::user()->name;
        $phone  = Auth::user()->phone;
        $address  = Auth::user()->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = "paid";
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addsuccess('Product ordered successfully');
        return redirect('mycart'); 
    }

     /**
     * cantact send.
     */
    public function send()
    {
        $contact = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);
        Mail::to('sanjaydcse@gmail.com')->send(new ContactUs($contact));
        toastr()->timeOut(10000)->closeButton()->addsuccess('Message send successfully');
        return redirect()->back();
    }

     /**
     * profile.
     */
    public function profile()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->count();
        $orders_count = Order::where('user_id', $user)->count();
        $cart_count = Cart::where('user_id', $user)->count();
        $order =Order::where('user_id',$user)->get();
        $totalOrders = Order::where('user_id', $user)->count();
        $inProgress = Order::where('user_id', $user)->where('status', 'In Progress')->count();
        $onTheWay = Order::where('user_id', $user)->where('status', 'On the way')->count();
        $delivered = Order::where('user_id', $user)->where('status', 'Delivered')->count();
        return view('home.profile', compact('count', 'orders_count', 'cart_count','order','totalOrders', 'inProgress', 'onTheWay', 'delivered'));
    }
}
