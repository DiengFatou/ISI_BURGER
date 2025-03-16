<!DOCTYPE html>
<html>
  <head> 
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

          <form action="{{ url('upload_food') }}" method="POST" enctype="multipart/form-data">

            @csrf

                <div class="div_deg">
                    <label for="name">Nom du plat</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="div_deg">
                    <label for="price">Prix du plat</label>
                    <input type="text" name="price" id="price" required>
                </div>

                <div class="div_deg">
                    <label for="image">Image du plat</label>
                    <input type="file" name="image" id="image" required>
                </div>

                <div class="div_deg">
                    <label for="description">Description du plat</label>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="div_deg">
                    <input type="submit" value="Ajouter le plat" class="btn btn-success">
                </div>
          </form>
      </div>

         @include('admin.js')   
      <!-- JavaScript files-->
   </body>
</html>