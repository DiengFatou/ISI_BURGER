<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
    <style>
        .div_center
        {
            display: flex;
            justify-content: center;
            align-items: center; 
            margin-top: 50px;
        }
        label
        {
            display: block;
            width: 200px;
        }
        .div_deg
        {
            padding: 20px;
        }
        table
        {
           margin: 40px;
           border: 2px solid skyblue;
           padding: 40px;

        }
        th{
            padding: 10px;
            text-align: center;
            background-color: midnightblue;
            font-weight: bold;
        }
        td
        {
            padding: 10px;
            color: white;
        }
        .frm
        {
            border: 1px solid skyblue;
            display: grid;
            gap: 15px;
            grid-template-columns: 1fr 1fr;

        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
        
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>

                @if (Route::has('login'))

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my_cart') }}">Panier</a>
                    </li>

                    <form action="{{ route('logout') }}" method="Post">
                        @csrf
                         <input class="btn btn-primary ml-xl-4" type="submit" value="Deconnexion">
                    </form>

                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route ('login')}}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                </li>
                @endauth
                @endif
               
            </ul>
        </div>
    </nav>
<br><br><br><br>
    <div>
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">

        <table>
            <tr>
                
                <th>Nom du plat</th>
                <th>Prix</th>
                <th>quantite</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php
                $total_price = 0;
            ?>
            @foreach ($cart as $carts)
            
                <tr>
                    <td>{{$carts->name_food}}</td>
                    <td>{{$carts->price}}</td>
                    <td>{{$carts->quantity}}</td>
                    <td>
                        <img width="150" src="food_img/{{ $carts->image }}" alt="">
                    </td>
                    <td>
                         <a onclick="return confirm('Etes vous sur de vouloir supprimer ce plat ?')" class="btn btn-danger" href="{{ url('remove_cart', $carts->id) }}">Supprimer</a>
                    </td>
                  

                </tr>
           

                <?php
                    $total_price = $total_price + $carts->price;
                ?>

            @endforeach
        </table>
        <h3>Total:  {{ $total_price }}F</h3>
    </div>

    <div class="div_center">
        <form action="{{ url('confirm_order') }}" method="POST" class="p-4 rounded shadow frm">
        @csrf  
        <div class="div_deg">
                <label for="">Nom</label>
                <input type="text" name="name" id="name" value="{{ Auth()->user()->name }}">
            </div>

            <div class="div_deg">
                <label for="">Email</label>
                <input type="text" name="email" id="email" value="{{ Auth()->user()->email }}">
            </div>

            <div class="div_deg">
                <label for="">Telephone</label>
                <input type="text" name="phone" id="name" value="{{ Auth()->user()->phone }}">
            </div>

            <div class="div_deg">
                <label for="">Adresse</label>
                <input type="text" name="address" id="name" value="{{ Auth()->user()->address }}">
            </div>
            <div>
            <input class="btn btn-warning" type="submit" value="Confirmer votre commande">
            </div>
            <br><br><br>
        </form>
    </div>
</body>
</html>
