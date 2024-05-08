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
            text-align: center;
        }

        .blue {
            color: blue
        }

        .imagen {
            width: 80px;
        }

        .nombre {
            font-size: 14px;
            color: cyan;
        }

        .boton {
            padding: 6px;
            background-color: rgb(79, 79, 79);
            color: white;
            border-radius: 50%;
        }
    </style>

</head>

<body>
    <div class="imagen">
        <img src="{{ asset('/storage/eventos/' . $imagen) }}" alt="" title="" class="rounded w-full">
    </div>

    <h3 class="nombre">{{ ucwords($nombre) }}</h3>
    
    <h1>Te presentamos lo nuevo</h1>
    
    <br>
    
    <p>Desde ya podrás tener oportunidad de participar en nuestros eventos y mantenerte al día con las noticias de
        tu Escuela de Cocina Le Concassé.</p>
    <br>
    
    <p>Hazlo todo</p>
    <p>¡Fácil, rápido y seguro!</p>
    
    <br>

    <a href="#" class="boton">Entérate ya</a>

    <br>

    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, voluptas officia. Incidunt facilis blanditiis
        doloribus numquam labore? Tempore consectetur corrupti impedit perspiciatis harum suscipit aspernatur
        molestias doloribus ab, quaerat aliquid.
    </p>

    <br>

    <a href="#">Eliminar suscripción</a>



</body>

</html>
