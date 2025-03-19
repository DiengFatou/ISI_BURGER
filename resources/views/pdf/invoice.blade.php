<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
        }
        .invoice-details {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Facture #{{ $order->id }}</h1>
        <p>Date de facturation : {{ $order->created_at->format('d/m/Y') }}</p>
        <p>Status de livraison : {{ $order->delivery_status }}</p>
    </div>

    <div>
        <h3>Informations de la commande</h3>
        <table class="invoice-details">
            <tr>
                <th>Nom du produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
            @if($order->items && $order->items->isNotEmpty())
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->name_food ?? 'N/A' }}</td>
            <td>{{ $item->quantity ?? 0 }}</td>
            <td>{{ isset($item->price) ? number_format($item->price, 2, ',', ' ') : '0.00' }} F CFA</td>
            <td>{{ isset($item->quantity, $item->price) ? number_format($item->quantity * $item->price, 2, ',', ' ') : '0.00' }} F CFA</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">Aucun produit dans cette commande.</td>
    </tr>
@endif

        </table>

        <p class="total">Total : {{ number_format($order->total_amount, 2, ',', ' ') }} F CFA</p>
    </div>

    @if($order->user)
    <p>Nom : {{ $order->user->name }}</p>
    <p>Téléphone : {{ $order->user->phone }}</p>
@else
    <p>L'utilisateur n'est pas disponible.</p>
@endif


</body>
</html>
