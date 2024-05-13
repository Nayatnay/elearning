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
            padding: 20px 60px;
            text-align: center;
        }

        .nombre {
            color: rgb(187, 187, 187);
        }

        .cuerpo {
            background-color: rgb(137, 1, 1);
            color: white;
            padding: 40px;
        }

        .info {
            background-color: white;
            border-radius: 8px;
            display: inline-block;
            padding: 6px 20px;
            text-decoration: none;
            color: black
        }

        .del {
            text-decoration: none;
            color: white;
        }

        .tope {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgb(40, 40, 40);
            padding: 20px 40px;
        }

        .tope2 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgb(40, 40, 40);
            padding: 20px 40px;
            color: white;
            line-height: 1rem;

        }

        .lecon {
            text-align: left;
        }

        .imagen {
            display: block;
            border-radius: 6px;
        }

        .imagen2 {
            display: none;
            border-radius: 6px;
        }

        @media screen and (max-width: 640px) {

            body {
                padding: 10px;
            }

            .tope {
                padding: 10px;
            }

            .tope2 {
                padding: 10px;
            }

            h2 {
                font-size: 16px;
            }

            h1 {
                font-size: 18px;
            }

            .imagen {
                display: none;
            }

            .imagen2 {
                display: block;
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <div class="tope">
        <img src="{{ $message->embed(public_path() . '/storage/eventos/' . $imagen) }}" alt="" title=""
            width="64px" class="imagen">
        <h2 class="nombre">{{ $nombre }}</h2>
    </div>

    <div class="cuerpo">

        <p>Estimado Suscriptor</p>
        
        <img src="{{ $message->embed(public_path() . '/storage/eventos/' . $imagen) }}" alt="" title=""
            width="64px" class="imagen2">


        <h1>Te presentamos lo nuevo</h1>

        <br>

        <p>Desde ya podrás tener oportunidad de participar en nuestros eventos y mantenerte al día con las noticias de
            tu Escuela de Cocina Le Concassé.</p>
        <br>

        <p>Hazlo todo ¡Fácil, rápido y seguro!</p>


        <br>

        <a href="{{ route('eventos') }}" class="info">Entérate ya</a>

        <br>
        <br>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, voluptas officia. Incidunt facilis
            blanditiis
            doloribus numquam labore? Tempore consectetur corrupti impedit perspiciatis harum suscipit aspernatur
            molestias doloribus ab, quaerat aliquid.
        </p>

        <br>
        <br>
    </div>

    <div class="tope2">
        <div class="lecon">
            <h2>LeConcassé</h2>
        </div>
        <a href="{{ route('preferencia', $email) }}" class="del">Eliminar suscripción </a>
    </div>

    <br>
    <br>

</body>

</html>
