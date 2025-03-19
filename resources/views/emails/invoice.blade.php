<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - Commande #{{ $order->id }}</title>
</head>
<body>
    <h1>Facture pour la commande #{{ $order->id }}</h1>
    <p><strong>Nom du client :</strong> {{ $order->name }}</p>
    <p><strong>Email :</strong> {{ $order->email }}</p>
    <p><strong>Téléphone :</strong> {{ $order->phone }}</p>
    <p><strong>Adresse :</strong> {{ $order->address }}</p>
    <p><strong>Nom de la nourriture :</strong> {{ $order->name_food }}</p>
    <p><strong>Quantité :</strong> {{ $order->quantity }}</p>
    <p><strong>Prix :</strong> {{ $order->price }} CFA</p>
    <h3>Total : {{ $order->price * $order->quantity }} CFA</h3>
</body>
</html>
