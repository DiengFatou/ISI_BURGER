<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
        table{
            border:1px solid skyblue;
            margin: auto;
            width: 600px;
        }

        th
        {
            color: white;
            font-weight: bold;
            font-size: 9px;
            text-align: center;
            background-color: midnightblue;
            padding: 8px;

        }

        td
        {
            color: white;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            padding: 10px;  
        }
   </style>
  </head>
  <body>
            @include('admin.header')
            @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table>
                <tr>
                    <th>Nom du client</th>
                   
                    <th>Email</th>
                   
                    <th>Telephone</th>
                   
                    <th>Adresse</th>
                   
                    <th>Nom du plat</th>
                   
                    <th>Quantite</th>
                   
                    <th>Prix</th>
                   
                    <th>Image</th>
                   
                    <th>Status</th>

                    <th>Changer l'Status</th>
                    <th>Paiement</th>


                </tr>

                @foreach ($order as $orders )
                
                <tr>
                    <td>{{ $orders->name }}</td>
                    <td>{{ $orders->email }}</td>
                    <td>{{ $orders->phone }}</td>
                    <td>{{ $orders->address}}</td>
                    <td>{{ $orders->name_food }}</td>
                    <td>{{ $orders->quantity }}</td>
                    <td>{{ $orders->price }}</td>
                    <td>
                        <img width="100" src="food_img/{{ $orders->image }}" alt="">
                    </td>
                    <td>{{ $orders->delivery_status }}</td>

                    <td>
                        @if(!$orders->paid)
                            <a onclick="return confirm('Êtes-vous sûr de vouloir changer le statut ?')" class="btn btn-warning" href="{{ url('on_the_way', $orders->id ) }}">En Pre</a>

                            <a onclick="return confirm('Êtes-vous sûr de vouloir changer le statut ?')" class="btn btn-success" href="{{ url('delivered', $orders->id)}}">prete</a>

                            <a onclick="return confirm('Êtes-vous sûr de vouloir changer le statut ?')" class="btn btn-danger" href="{{ url('canceled', $orders->id) }}">Annulée</a>
                        @else
                            <span class="badge bg-success">Déjà payé</span>
                        @endif
                    </td>
                    <td>
                        @if($orders->paid)
                            <span class="badge bg-success">Payé</span>
                        @else
                            <span class="badge bg-danger">Non payé</span>
                        @endif
                    </td>

                    <td>
                        @if(!$orders->paid)
                            <a onclick="return confirm('Êtes-vous sûr de vouloir marquer cette commande comme payée ?')" class="btn btn-primary" href="{{ route('paymentStatus', $orders->id) }}">M payée</a>
                        @else
                            <a onclick="return confirm('Êtes-vous sûr de vouloir marquer cette commande comme non payée ?')" class="btn btn-secondary" href="{{ route('paymentStatus', $orders->id) }}">M n_payée</a>
                        @endif
                    </td>


                </tr>
                @endforeach

            </table>
          </div>

         @include('admin.js')   
      <!-- JavaScript files-->
   </body>
</html>