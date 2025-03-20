<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</html><!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
        table
        {
            border: 1px solid skyblue;
            margin: auto;
            width: 800px;
        }
        th
        {
            background-color: steelblue;
            color: white;
            padding: 10px;
            margin: 10px;
        }

        td
        {
            color: white;
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
                    <!-- JavaScript files-->
      @include('admin.js')  
                    <div>
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>prix</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>

                            </tr>


                            @foreach ( $foods as $food )
                            
                            <tr>
                                <td>{{ $food->name_food }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->description }}</td>
                                <td><img src="{{ url('food_img/' . $food->image) }}"
                                 alt="Image de {{ $food->name_food }}" width="80"></td>
                                 <td>
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer ce plat ?')" class="btn btn-warning" href="{{ url('update_food', $food->id) }}">Modifier</a>
                               
                                </td>
                                 <td>
                                    <a class="btn btn-danger" onclick="return 
                                    confirm('Etes vous sur de vouloir supprimer ce plat')" 
                                    href="{{ url('delete_food', $food->id) }}">Supprimer</a>
                                  </td>  
                                 
                               
                            @endforeach
                        </table> 
                    </div>
                </div>
            </div>
        </div>
       
       
        
    </body>
</html>