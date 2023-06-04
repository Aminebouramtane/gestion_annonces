<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center">
    <h2>Connexion</h2>
    <form action="{{route('login')}}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Entrez votre email" value="{{ old('email')}}"/><br>
        @error("email")
        <span style="color:red"> {{$message}}</span><br>
        @enderror
        <input type="password" name="password" placeholder="Entrez votre mot de passe" /><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>