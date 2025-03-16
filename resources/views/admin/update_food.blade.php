<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
   @include('admin.css')
   <style>
        label
        {
            display:block;
            color: white;
        }

        .div_deg
        {
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
            <h1>Modifier un plat</h1>

            <form action="{{ url('edit_food', $food->id) }}" method="post" enctype="multipart/form-data">
           @csrf
            <div class="div_deg">
                    <label for="name">Nom du plat</label>
                    <input type="text" name="name" id="name" value="{{ $food->name }}" required>
                    
                </div>

                <div class="div_deg">
                    <label for="price">Prix du plat</label>
                    <input type="text" name="price" id="price" value="{{ $food->price }}" required>
                </div>

                <div class="div_deg">
                    <label for="image">Image du plat</label>
                    <img width="150px" src="food_img/{{ $food->image }}" alt="">                
                </div>

                <div class="div_deg">
                    <label for="image">Nouvelle Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="div_deg">
                    <label for="description">Description du plat</label>
                    <textarea name="description" id="description" value="{{ $food->description }}" required></textarea>
                </div>

                <div class="div_deg">
                    <input type="submit" value="Modifier le plat" class="btn btn-success">
                </div>
          </form>
      </div>

         @include('admin.js')   
      <!-- JavaScript files-->
   </body>
</html>