<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Book;

use App\Models\User;
class HomeController extends Controller
{
    public function my_home()
    {
        $food = Food::all();
        return view ('home.index', compact('food'));
    }
    public function index()
    {
        if (Auth::id()) 
        { 
            $usertype = Auth::user()->usertype; 
           
            if ($usertype == 'admin') {
                
              $total_user = User::where('usertype', '=', 'user')->count();
           
                $total_food = Food::count();
                $total_order = Order::count();

                $total_delivered = Order::where('delivery_status', '=', 'Livree')->count();
                
                return view ('admin.index', compact('total_user','total_food','total_order', 'total_delivered')); 


            } else {
                $food = Food::all();
           
                return view('home.index', compact('food'));
           
            } 
       
        }

        return redirect()->route('login'); // Redirige vers la connexion si non authentifié
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $food =Food::find($id);
           
            $cart_name = $food->name_food;

            $cart_price= Str::remove('F',$food->price);

            $cart_description = $food->description;

            $cart_image = $food->image;

            $cart = new Cart;

            $cart->name_food=$cart_name;

            $cart->price=$cart_price * $request->quantity;

            $cart->description =$cart_description;

            $cart->quantity =$request->quantity;

            $cart->image= $cart_image;

            $cart->user_id = Auth::id();
           
            $cart->save();

            return redirect()->back()->with('success', 'Plat ajouté au panier avec succès !');
        }
        else
        {
            return redirect('login');
        }

    }

    public function my_cart()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id','=',$user_id)->get();
        return view('home.my_cart', compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)

    {
        $user_id = Auth::id(); 
        
        $cart = Cart::where('user_id','=', $user_id)->get();

        foreach($cart as $carts)
        {
            $order = new Order;
            
            $order->name =$request->name;
           
            $order->email =$request->email;
           
            $order->phone =$request->phone;
           
            $order->address =$request->address;
           
            $order->name_food =$carts->name_food;
           
            $order->price =$carts->price;

            $order->quantity =$carts->quantity;
          
            $order->image =$carts->image;
          
            $order->delivery_status = "En attente";          
           
            $order->save();
            
            $data = Cart::find($carts->id);

            $data->delete();

        }

        return redirect()->back()->with('message', 'Commande confirmée avec succès');

    }

    public function book_table(Request $request)
    {
        $book = new Book;
        
        $book->phone = $request->phone;
        
        $book->guest = $request->n_guest;
        
        $book->time = $request->time;
        
        $book->date = $request->date;

        $book->save();

        return redirect()->back();

    }
}