<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
        padding: 20px;
    } 

</style>

</head>
<body>
    <h1>¡Hola! </h1>
    <p>Me llamo <strong>{{$nombre}}</strong> - Mi e-mail <strong>{{$email}}</strong></p>
    <br>
    <div>
        {{-- el uso de los signos de admiracion y lasa llaves simples permite moistrar el mensaje
        con el formato dado en el CKEDITOR --}}
        {!! $mensaje !!}
        
    </div>
</body>
</html>