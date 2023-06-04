@extends("template.master")
@section("titre", "Liste des annonces")
@section("contenu")

    @isset($annonces)
        <h2 class="mt-3 mb-2">Liste des annonces</h2>
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
        @endif
        @auth
        <a href="{{ route('annonce.create') }}" class="btn btn-primary mb-3">Nouvelle annonce</a>
        @endauth

        <table class="table">
            <tr>
                <th>Photo</th>
                <th>Titre</th>
                <th width="200px">Description</th>
                <th>Type</th>
                <th>Ville</th>
                <th>Superficie(m<sup>2</sup>)</th>
                <th>Etat</th>
                <th>Prix(dhs)</th>
                 @auth  <th>Actions</th> @endauth
            </tr>
            @foreach($annonces as $annonce)
                <tr>
                    <td>
                        @isset($annonce->photo)
                          <img src="{{ asset($annonce->photo) }}" alt="" width="80px">
                        @else
                         <img src="{{ asset('photos/vide.jpg') }}" alt="" width="80px">
                        @endisset
                    </td>
                    <td> <a href="{{ route('annonce.show',$annonce->id) }}" style="color:gray"> {{ $annonce->titre }}</a>
                       </td>
                    <td>{{ $annonce->description }}</td>
                    <td>{{ $annonce->type }}</td>
                    <td>{{ $annonce->ville }}</td>
                    <td>{{ $annonce->superficie }}</td>
                    <td>{{ $annonce->neuf? "Neuf":"Ancien" }}</td>
                    <!-- <td> -->
                        <!-- <input type="checkbox" name="" id="" disabled <?php // $annonce->neuf? "checked":"" ?> }}> -->
                    <!-- </td> -->
                    <td>{{ $annonce->prix }}</td>
                   @auth    
                   <td>
                        @can(['update', 'delete'], $annonce)
                            <form action="{{ route('annonce.destroy',$annonce->id) }}"  method="post">
                                @csrf
                                @method("DELETE")
                            
                                <a href="{{ route('annonce.edit',$annonce->id) }}" style="color:blue"><i class="bi bi-pencil"></i></a>
                                <button type="submit" style="color:red" class="btn border-none"
                                onclick="return confirm('Voulez vous vraiment supprimer l\'annonce : {{$annonce->titre }}?')"
                                ><i class="bi bi-trash2"></i></button>
                            </form>
                            <p class="small"><i>{{$annonce->etat}}</i></p>
                         @endcan
                    </td>
                    @endauth
                </tr>
            @endforeach

        </table>
    @endisset
@endsection