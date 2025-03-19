<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="assets/imgs/ISIBURGER.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">DIENG Fatou</h1>
            <p>Admin</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Tableau de bord</span>
        <ul class="list-unstyled">
               
        <li><a href="{{ url('home') }}" aria-expanded="false" data-toggle="collapse"> 
                    <i class="icon-home"></i>Accueil </a>
               
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                    <i class="icon-windows"></i>Plats </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('add_food') }}">Ajouter un Plat</a></li>
                  <li><a href="{{ url('view_food') }}">Liste des Plats</a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{url('orders')}}"> <i class="icon-order"></i>Commandes</a></li>

                  <li>
                  <a href="{{url('reservations')}}"> <i class="icon-logout"></i>Reservations</a></li>
        </ul><span class="heading">Extras</span>
       
      </nav>
      <!-- Sidebar Navigation end-->