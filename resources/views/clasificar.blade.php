<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Investigación</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    </head>
    <body class="antialiased">
        
        <div class=" mt-5  "  >
            <div class=" text-center row"  >
                <div class="col-9">
                    <h2>Investigaciones por revisar</h2>
                </div>
                <div class="col-3">
                    <a type="button" class="btn btn-dark"  href="{{route('revisados')}}">Investigaciones Revisadas</a>
                    <a type="button" class="btn btn-dark"  href="{{route('welcome')}}">Home</a>
                </div>
            </div>
            <hr>
            <table class="table table-hover  ">
                <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Universidad</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Analizar</th>
                        <th scope="col">Clasificado</th>
                    </tr>
                </thead>
                @foreach ($investigaciones as $investigacion )

                @if($investigacion['nivel']==='Sin revisar')
                <tbody>
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$investigacion['titulo']}}
                            </br>
                            <strong>Año: </strong>
                            {{$investigacion['agno']}}
                            </br>
                            <strong>¿Cumple con los criterios?: </strong>
                            {{$investigacion['criterios']}} 
                        </td>

                        <td>{{$investigacion['universidad']}}</td>
                        
                        <td>
                            <a href="{{asset('/investigaciones').'/'.$investigacion['archivo']}}"  target="_blank" > 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4.97 11.03a.75.75 0 111.06-1.06L11 14.94V2.75a.75.75 0 011.5 0v12.19l4.97-4.97a.75.75 0 111.06 1.06l-6.25 6.25a.75.75 0 01-1.06 0l-6.25-6.25zm-.22 9.47a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H4.75z"></path></svg>
                            </a>
                        </td>

                        <td>
                            <a href="{{route('investigacion/analizar', $investigacion['tesis_id'])}}"   > 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            </a>
                        </td>

                        <td>{{$investigacion['nivel']}}</td>
                    </tr>
                </tbody>
                @endif
                @endforeach
            </table>
        </div>
        
    </body>
</html>
<!--Alert de datos recibidos-->
<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	if(exist){
		alert(msg);
	}
</script>
<!--END Alert de datos recibidos--> 
