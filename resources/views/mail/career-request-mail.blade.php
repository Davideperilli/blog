<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <h1>Abbiamo ricevuto una richiesta</h1>
            <div class="row text-center">
                <h4>Richiesta per il ruolo di {{$info['role']}}</h4>
            </div>
            <div class="col-12 col-md-8">
                <p>Ricevuta da {{$info['email']}}</p>
                <h5>Messaggio:</h5>
                <p>{{$info['message']}}</p>
            </div>
        </div>
    </div>
</body>
</html>