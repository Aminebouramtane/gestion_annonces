<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titre")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    @auth
    <div class="row">
        <div class="col-9 d-flex justify-content-start">
                   <a href="{{ url('annonce')}}" class="btn btn-link text-secondary">Annonces</a>
             @can('viewAny', App\Models\Annonce::class)
                   <a href="{{route('admin.annonce.index')}}" class="btn btn-link text-secondary">Gérer les annonces</a>
            @endcan
                </div>

    
        <div class="col-3 d-flex justify-content-end align-items-center">
                         
               
                     <div class="text-secondary d-flex">{{ Auth::user()->name}} </div>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-link text-secondary">Se déconnecter </button>
                        </form>
                    
        </div>
        </div>
     @endauth
    @guest
        <div style="text-align: right;">
            <a href="{{route('register')}}">S'inscrire</a>
            <a href="{{route('login')}}">Se connecter</a>
        </div>
    @endguest
    <div class="container">
        @yield("contenu")
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>