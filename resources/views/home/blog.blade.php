<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <h2 class="section-title py-5">Tous Nos Plats</h2>
        
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">


                @foreach ($food as $foods)
                
                
                    <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                            <img src="food_img/{{ $foods->image }}">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge 
                                badge-primary">{{ $foods->price }}</a></h1>
                                <h4 class="pt20 pb20">{{$foods->name}}</h4>
                                <p class="text-white">{{$foods->description}}</p>
                            </div>
                            <form action="{{ url('add_cart/'.$foods->id) }}" method="POST">
                                @csrf
                                <input name="quantity" value="1" type="number" min="1" required>
                                <input class="btn btn-success" type="submit" value="Ajouter au panier">
                            </form>

                                <br><br><br>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

   