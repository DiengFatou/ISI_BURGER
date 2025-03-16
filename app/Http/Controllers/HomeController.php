<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Food;
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
              
                return view ('admin/index'); 
           
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
           
            $cart_name = $food->name;

            $cart_price= Str::remove('F',$food->price);

            $cart_description = $food->description;

            $cart_image = $food->image;

            $cart = new Cart;

            $cart->name=$cart_name;

            $cart->price=$cart_price * $request->quantity;

            $cart->description =$cart_description;

            $cart->quantity =$request->quantity;

            $cart->image= $cart_image;

            $cart->userid = Auth::id();
           
            $cart->save();

            return redirect()->back()->with('success', 'Plat ajouté au panier avec succès !');
        }
        else
        {
            return redirect('login');
        }
    }
}
