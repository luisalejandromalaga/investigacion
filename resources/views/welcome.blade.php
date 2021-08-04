<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Investigación</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Scripts -->
        <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    </head>
    <body class="antialiased">
        <div class="container pt-5">

            <div class="card" >
                <div class="card-header">
                    MENÚ
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{route('investigacion')}}">Nueva investigación</a></li>
                    <li class="list-group-item"><a href="{{route('clasificar')}}">Analizar investigaciones</a></li>
                    <li class="list-group-item"><a href="{{route('revisados')}}">Investigaciones analizadas</a></li>
                </ul>

                <div class="card-footer">
                    USO DE TÉCNICAS MATEMÁTICAS EN LAS TESIS DE PREGRADO DE LA CARRERA DE PSICOLOGÍA, AREQUIPA, PERIODO 2015-2019 - LUIS ALEJANDRO MÁLAGA ALLCA - 2021
                </div>


            </div>        

        </div>
    </body>
</html>
