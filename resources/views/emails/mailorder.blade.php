<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$data['name']}} merci pour ta commande !</h1>
    <p>La commande sera envoyer a {{$data['adress']}}, {{$data['city']}}, {{$data['state']}} in {{ $data['country']}}</p>
</body>
</html>