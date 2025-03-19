<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">Reserver une table</h2>
           
            <form action="{{ url('book_table') }}" method="post">
                @csrf
            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="text" id="booktable" name="phone" class="form-control form-control-lg custom-form-control" placeholder="Telephone">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" id="booktable" name="n_guest" class="form-control form-control-lg custom-form-control" placeholder="Nombre de places" max="20" min="0">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" id="booktable" name="time" class="form-control form-control-lg custom-form-control" placeholder="Heure">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" id="booktable" name="date" class="form-control form-control-lg custom-form-control" placeholder="12/12/12">
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="Trouver une table">
            </form>

        </div>
    </div>