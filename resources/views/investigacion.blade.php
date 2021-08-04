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
        <div class="container mt-5">
            <form class=" formperfil uk-form-horizontal " action="{{route('nueva.investigacion')}}" method="POST" enctype="multipart/form-data">
            @csrf
                
                <div class="card" >
                    <div class="card-header row m-0">
                        <div class="col-10 p-0 ">
                            <h4> Agregar una investigación</h4>
                        </div>
                        <div class="col-2">
                            <a type="button" class="btn btn-dark"  href="{{route('welcome')}}">Home</a>
                        </div>
                    </div>

                    <div class="m-3">
                        <label for="exampleFormControlInput1" class="form-label"><h4>Titulo</h4></label>
                        <input type="" class="form-control" id="exampleFormControlInput1" placeholder="" name="titulo" required>
                    </div>

                    <div class="m-3">
                        <label for="exampleFormControlInput1" class="form-label"><h4>Año</h4></label>
                        <input type="" class="form-control" id="exampleFormControlInput1" placeholder="" name="agno" required>
                    </div>


                    <div class="m-3 ">
                        <h4>¿Cumple con los criterios de inclusión y exclusión?</h4>
                        <div class="p-3 card bg-light">
                            <h5>Criterios de inclusión</h5>
                            <ul class="list-group list-group-flush ">
                            <li class="list-group-item">Tesis de metodología cuantitativa</li>
                                <li class="list-group-item">Tesis descriptivas</li>
                                <li class="list-group-item">Tesis Correlacionales</li>
                                <li class="list-group-item">Validación de instrumentos</li>
                                <li class="list-group-item">Programas de intervención</li>
                                <li class="list-group-item">Investigaciones experimentales</li>
                                <li class="list-group-item">Sustentada en el periodo 2015-2019</li>
                            </ul>

                            
                            <h5 class="mt-4">Criterios de exclusión</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Tesis de metodología cualitativa</li>
                                <li class="list-group-item">Tesis de metodología mixta</li>
                                <li class="list-group-item">Revisiones sistemáticas</li>
                                <li class="list-group-item">Que no se pueda acceder al documento completo</li>
                            </ul>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="criterios" id="flexRadioDefault0" value="Si cumple" required>
                            <label class="form-check-label" for="flexRadioDefault0">
                                Si cumple
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="criterios" id="flexRadioDefaultA" value="No cumple" required>
                            <label class="form-check-label" for="flexRadioDefaultA">
                                No cumple
                            </label>
                        </div>
                    </div>

                    <div class="m-3">
                        <h4>Universidad</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="universidad" id="flexRadioDefault1" value="Universidad Nacional de San Agustin de Arequipa" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Universidad Nacional de San Agustin de Arequipa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="universidad" id="flexRadioDefault2" value="Universidad Católica de Santa María" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Universidad Católica de Santa María
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="universidad" id="flexRadioDefault3" value="Universidad Católica San Pablo">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Universidad Católica San Pablo
                            </label>
                        </div>
                    </div>

                    <div class="m-3">
                        <label for="formFile" class="form-label"><h4>Archivo</h4></label>
                        <input class="form-control" type="file" id="formFile" name="doc" required >
                    </div>


                    <div class="m-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><h4>Metodología</h4></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="metodologia" required></textarea>
                    </div>


                    <div class="m-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><h4>Población</h4></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="poblacion" required></textarea>
                    </div>

                    <div class="m-3">
                        <label for="exampleFormControlInput1" class="form-label"><h4>Variables</h4></label>
                        <button type="button" class="btn btn-outline-primary mb-3" onclick="nueva()">Agregar campo</button>
                        <div class="" id="data">
                        </div> 
                    </div>

                    <button class="btn btn-outline-dark" onclick="return confirm('¿Estás seguro de que deseas Registrar una nueva Investigación?');">Registrar Investigación</button> 
				

                </div>        

            </form>
        </div>

        <hr class="mt-5">

        <div class=" mt-5  "  >
            <div class=" text-center"  >
            <h2>Investigaciones</h2>
            </div>
            <hr>
            <table class="table table-hover  ">
                <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Universidad</th>
                        <th scope="col">Metodología</th>
                        <th scope="col">Población</th>
                        <th scope="col">Variables</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Analizar</th>
                    </tr>
                </thead>
                @foreach ($investigaciones as $investigacion )
                <tbody>
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$investigacion->titulo}}
                            </br>
                            <strong>Año: </strong>
                            {{$investigacion->agno}}
                            </br>
                            <strong>¿Cumple con los criterios?: </strong>
                            {{$investigacion->criterios}} 
                        </td>
                        <td>{{$investigacion->universidad}}</td>
                        <td>{{$investigacion->metodologia}}</td>
                        <td>{{$investigacion->poblacion}}</td>

                        <?php
                        echo('<td>');
                            $variables = json_decode($investigacion->variables, true);
                            if ($variables == null) {
                                echo('vacio');
                            }else{
                                for ($i=0; $i < count($variables); $i++) { 
                                    print_r('<strong>Variable: </strong>'.$variables[$i]['variable'] .'</hr> </br> <strong>Instrumento: </strong>'. $variables[$i]['instrumento'].'<hr>');
                                };
                            }

                        echo('</td>');
                        ?>

                        <td>
                            <a href="{{asset('/investigaciones').'/'.$investigacion->archivo}}"  target="_blank" > 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4.97 11.03a.75.75 0 111.06-1.06L11 14.94V2.75a.75.75 0 011.5 0v12.19l4.97-4.97a.75.75 0 111.06 1.06l-6.25 6.25a.75.75 0 01-1.06 0l-6.25-6.25zm-.22 9.47a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H4.75z"></path></svg>
                            </a>
                        </td>

                        <td>
                            <a href="{{route('investigacion/analizar', $investigacion->tesis_id)}}"  target="_blank" > 
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            </a>
                        </td>

                    </tr>
                </tbody>
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

<script>
i = 1;
j = 0;
k = 0;
function nueva() 
{
    a = document.getElementById('data');
    div = document.createElement('div');
    div.setAttribute('class', 'card p-2 mb-2 bg-light ');
    a.append(div);
    b = document.createElement('input');
    c = document.createElement('input');

    b.setAttribute('id', 'cont'+ (i++));
    b.setAttribute('name', 'variable['+j+++'][variable]');
    b.setAttribute('class', 'form-control mb-1');
    b.setAttribute('placeholder', 'Variable');
    b.required = true;
    

    
    c.setAttribute('id', 'cont'+ (i++));
	c.setAttribute('name', 'variable['+k+++'][instrumento]');
	c.setAttribute('class', 'form-control mb-1');
    c.setAttribute('placeholder', 'Instrumento');
    c.required = true;

    div.append(b, c);

    
    //create your delete button after you click try it
    del = document.createElement('a');
    //del.style.textDecoration = 'none';
    del.innerHTML = 'Eliminar';
    del.setAttribute('class', 'link-dark');
    del.style.cursor = 'pointer';
    //assign a function for it when clicked
    del.addEventListener("click", deleteButton, false);  
    div.appendChild(del);
}

function deleteButton() {
    this.parentNode.parentNode.removeChild(this.parentNode);
}
</script>

