@extends("template.master")
@section("titre", "Liste des annonces")
@section("contenu")
@isset($annonce)
<h2 class="mt-2 mb-2">Modification de l'annonce numero {{ $annonce->id }}</h2>
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</ul>
@endif

    <form action="{{ route('annonce.update', $annonce->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="{{$annonce->titre }}"  >
        </div>

        <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description"  value="{{$annonce->description }}">
        </div>

        <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type">
                <option value="Appartement"  {{$annonce->type=="Appartement"? "selected":"" }}  >Appartement</option>
                <option value="Maison" {{$annonce->type=="Maison"? "selected":"" }}>Maison</option>
                <option value="Villa" {{$annonce->type=="Villa"? "selected":"" }}>Villa</option>
                <option value="Magasin" {{$annonce->type=="Magasin"? "selected":"" }} >Magasin</option>
                <option value="Terrain" {{$annonce->type=="Terrain"? "selected":"" }}>Terrain</option>
         </select> </div>

        <div class="mb-3">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville"  value="{{$annonce->ville }}">
        </div>

        <div class="mb-3">
        <label for="superficie" class="form-label">Superficie</label>
        <input type="text" class="form-control" id="superficie" name="superficie"  value="{{$annonce->superficie }}">
        </div>

        <div class="mb-3 form-check-inline">
        <label class="form-label ">Etat</label><br>
         <input type="radio" id="neuf" name="neuf" value="1" {{$annonce->neuf? "checked":"" }}> Neuf &nbsp;
         <input type="radio" id="neuf" name="neuf"value='0' {{$annonce->neuf? "":"checked" }}> Ancien
        </div>

        <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix"  value="{{$annonce->prix }}">
        </div>
         <div class="mb-3">
            @isset($annonce->photo)
                <img src="{{ asset($annonce->photo) }}" alt="" width="200px"><br>
             @endisset
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endisset
@endsection