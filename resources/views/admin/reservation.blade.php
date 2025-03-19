<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
        table
        {
            border: 1px solid skyblue;
            margin: auto;
            width: 600px;
        }

        th{
            background-color: midnightblue;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        td
        {
            padding: 10px;
            text-align: center;
            color: white;
            font-weight: bold;
            margin-top: 100px;
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
                    <th>Telephone</th>
                    <th>Nmbre d'invite</th>
                    <th>Date</th>
                    <th>Heure</th>

                </tr>
                @foreach ($book as $books )
                
              
                <tr>
                    <td>{{$books->phone}}</td>
                    <td>{{$books->guest}}</td>
                    <td>{{$books->date}}</td>
                    <td>{{$books->time}}</td>

                </tr>
                @endforeach
            </table>
     
        </div>

         @include('admin.js')   
      <!-- JavaScript files-->
   </body>
</html>