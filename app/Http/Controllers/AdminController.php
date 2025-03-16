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
    
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('food_img',$imagename);
            $food->image =$imagename;
        }   
        $food->save();

        $food->save();
    
        return redirect()->back()->with('success', 'Plat ajouté avec succès');
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

    public function edit_food(Request $request, $id)
    {
        $food = Food::find($id);
    
        $food->name = $request->name;

        $food->price = $request->price;

        $food->description = $request->description;
    
        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('food_img',$imagename);
            $food->image =$imagename;
        }   
        $food->save();
    
        return redirect('view_food')->with('success', 'Plat modifié avec succès');
    }
    
}

