<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center">
    <h2>Inscription</h2>
    <form action="{{route('register')}}" method="post">
        @csrf
        <input type="text" name="nom_complet" placeholder="Entrez votre nom"/><br>
        <input type="text" name="email" placeholder="Entrez votre email"/><br>
        <input type="password" name="password" placeholder="Entrez votre mot de passe"/><br>
        <input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe"/><br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>