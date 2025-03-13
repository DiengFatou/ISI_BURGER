<?php

namespace App\Http\Controllers;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request)
    {
        $food = new Food;
        
        $food ->name = $request->name;
        
        $food ->price = $request->price;
        
        $food ->description = $request->description;
        
        $food ->image = $request->image;

        $food->save();

        return redirect()->back();
    }


    public function view_food()
    {
        $foods = Food::all();
        return view('admin.show_food', compact('foods'));
    }

    public function delete_food($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->back();
    }

    public function update_food($id)
    {
        $food = Food::find($id);
        return view('admin.update_food', compact('food'));

    }

    public function edite_food(Request $request, $id)
    {
        $food =Food::find($id);
        
        $food ->name = $request->name;
        
        $food ->price = $request->price;
        
        $food ->description = $request->description;
        
        $food->save();

        return redirect()->back();
    }
}

