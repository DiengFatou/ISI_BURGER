<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\Order;
use App\Models\Book;
use App\Mail\EnvoieMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request)
    {
        $food = new Food;
    
        $food->name_food = $request->name_food;
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
    
        $food->name_food = $request->name_food;

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

    public function orders()
    {
        $order = Order::all();
        return view('admin.orders', compact('order'));
    }
    
    public function on_the_way($id)
    {
        $order = Order::find($id);

        $order->delivery_status = "En Preparation";

        $order->save();

        return redirect()->back();
    }


    public function ready($id)
    {
        $order = Order::with('user')->find($id);
        $order->delivery_status = 'Prête';
        $order->save();
    
        // Générer le PDF
        $pdf = Pdf::loadView('emails.invoice', ['order' => $order]);
    
        // Sauvegarder le PDF dans un fichier
        $pdfPath = storage_path('app/public/invoices/' . $order->id . '.pdf');
        $pdf->save($pdfPath);
    
        // Envoyer l'e-mail avec le PDF attaché
        Mail::to($order->email)->send(new EnvoieMail($order, $pdfPath));
    
        return redirect()->back();
    }
    
    public function delivered($id)
    {
        $order = Order::with('user')->find($id); // Utilisation de 'with' pour charger l'utilisateur en même temps
    
        if (!$order) {
            return redirect()->back()->with('error', 'Commande introuvable.');
        }
    
        return view('pdf.invoice', compact('order'));
    }

    public function paymentStatus($id)
    {
        $order = Order::find($id);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Commande introuvable.');
        }
    
        // Inverser le statut de paiement
        $order->paid = !$order->paid;
        $order->save();
    
        return redirect()->back()->with('success', 'Statut de paiement mis à jour.');
    }
    


// Méthode pour générer la facture PDF (adaptée à ton code)
// Méthode pour générer la facture PDF (adaptée à ton code)
protected function generateInvoicePDF($order)
{
    // Utiliser une vue Blade pour générer la facture
    $pdf = Pdf::loadView('pdf.invoice', compact('order'));  
    $pdfPath = storage_path("app/public/invoices/{$order->id}_invoice.pdf");

    $pdf->save($pdfPath);

    return $pdfPath;
}


    public function canceled($id)
    {
        $order = Order::find($id);

        $order->delivery_status = "Annulee";

        $order->save();

        return redirect()->back();
    }

    public function reservations()
    {
        $book = Book::all();
        return view('admin.reservation', compact('book'));
    }

    public function ordersbymounth()
    {
        $commandesParMois = Order::selectRaw('MONTH(created_at) as mois, count(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        return response()->json($commandesParMois);
    }

    // Récupérer les statistiques pour les produits par catégorie par mois
    public function FoodByCatByMounth()
    {
        $produitsParCategorie = Food::selectRaw('MONTH(commandes.created_at) as mois, categories.nom as categorie, count(*) as total')
            ->join('commandes', 'produits.commande_id', '=', 'commandes.id')
            ->join('categories', 'produits.categorie_id', '=', 'categories.id')
            ->groupBy('mois', 'categorie')
            ->orderBy('mois')
            ->get();

        return response()->json($produitsParCategorie);
    }

    // Récupérer les recettes journalières
    public function recettesJournalieres()
    {
        $recettes = Order::selectRaw('DATE(created_at) as date, sum(montant) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($recettes);
    }

}

