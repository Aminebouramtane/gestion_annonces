@extends("template.master")
@section("titre", "Liste des annonces")
@section("contenu")
<h2 class="mt-2 mb-2">Nouvelle annonce</h2>
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</ul>
@endif
    <form action="{{ route('annonce.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre">
        </div>

        <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
        </div>

        <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type">
                <option selected>Veuillez choisir un type</option>
                <option value="Appartement">Appartement</option>
                <option value="Maison">Maison</option>
                <option value="Villa">Villa</option>
                <option value="Magasin">Magasin</option>
                <option value="Terrain">Terrain</option>
         </select> </div>

        <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
        </div>

        <div class="mb-3">
        <label for="superficie" class="form-label">Superficie</label>
        <input type="text" class="form-control" id="superficie" name="superficie">
        </div>

        <div class="mb-3 form-check-inline">
        <label class="form-label ">Etat</label><br>
         <input type="radio" id="neuf" name="neuf" value="1"> Neuf &nbsp;
         <input type="radio" id="neuf" name="neuf"value='0'> Ancien
        </div>

        <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
        </div>
  <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection