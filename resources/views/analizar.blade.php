<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Investigación</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- LaTex Code -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<!--Alert de datos recibidos
<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	if(exist){
		alert(msg);
	}
</script>
END Alert de datos recibidos--> 


    </head>
    <body class="row mt-0 mb-0 ml-0 mr-0" style="margin: 0px !important;" >



<script>
window.onload = function() {
    let boton = document.getElementById("boton");
    let errores_div = document.getElementById("errores_div");
    boton.onclick = function() {
        alert("Estas seguro quu deseas agregar este error?");
        let error = document.getElementById("error_coment").value;
        fetch('/nuevo/error', {
            method: 'POST',
            headers:{
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            credentials: "same-origin",
            body: JSON.stringify({
                error: error,
            })
        })
        .then( res => res.json( ) )
        .then( data => {
            if ( data==='error' ) {
                errores_div.innerHTML = `
                    <div id="" class="uk-alert-primary" uk-alert >
                        <a class="uk-alert-close" uk-close></a>
                        <p>Algo salio mal :(</p>
                    </div>
                `
            } else if (data==='bien') {
                alert("Error agregado con exito");
                location.reload();
            }
        })
    }
};
</script>





        <div class="col-5 mt-0 mb-0 ml-0 mr-0" style="overflow-y: scroll; height: 100vh;" >
                <div class="card" >


                    <div class="card-header row m-0" id="top">
                        <div style="margin-top: 35px;">
                            <h4> <?php print_r($investigacion[0]['titulo']);?> </h4>
                            
                            <?php 
                                if( count($revisado)>0)
                                {
                                    echo('<h5  style="color: blue;">');
                                        print_r($revisado[0]['nivel']); 
                                    echo('</h5>');
                                }else{
                                    echo('<h5 style="color: red;"> Sin revisar </h5>');
                                }
                            ?>
                        </div>


                            <div class="fixed-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-dark"  href="#tecnica">Técnica</a>
                                    <a type="button" class="btn btn-dark"  href="#lugar">Lugar</a>
                                    <a type="button" class="btn btn-dark"  href="#errores">Errores</a>
                                    <a type="button" class="btn btn-dark"  href="#errores_add">Add</a>
                                    <a type="button" class="btn btn-dark"  href="#nivel">Nivel</a>
                                    <a type="button" class="btn btn-dark"  href="#revision">Revisión</a>
                                    <a type="button" class="btn btn-dark"  href="#top" >Top</a>
                                    <a type="button" class="btn btn-dark"  href="{{route('clasificar')}}">Clasificar menú</a>
                                    
                                </div>
                            </div>


                    </div>








                    <div class="m-3" >

                        <div class="p-3 card bg-light mb-3" id="tecnica">
                            
                            <div class="row">
                                <div class="col" >
                                    <div class="text-center">
                                        <h4>Nueva técnica</h4>
                                    </div>
                                    
                                    <form class=" formperfil uk-form-horizontal " action="{{route('nueva.tecnica')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label"><h5>Nombre</h5></label>
                                            <input type="" class="form-control" id="exampleFormControlInput1" placeholder="" name="tecnica" required>
                                        </div>

                                        <div class="">
                                            <label for="exampleFormControlTextarea1" class="form-label"><h5>Descripción (Opcional)</h5></label>
                                            <p>*Acepta LaTex</p>
                                            <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="4" name="tecnica_desc" ></textarea>
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-outline-dark" onclick="return confirm('¿Estás seguro de que deseas  Agregar  una nueva técnica?');">Agregar técnica</button> 
                                        </div>
                                    </form>
                                    
                                </div>

                    <!--Este form es para crear un nuevo registro de la tecnica-->                
                    <form class=" formperfil uk-form-horizontal " action="{{route('nueva.registro')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                                <div class="col">
                                    <h4>Técnica</h4>
                                    Selecciona la tecnica
                                    @foreach ($tecnicas as $tecnica)
                                    <hr>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tecnica_id" id="{{$tecnica["tecnica_name"]}}" value="{{$tecnica["tecnica_id"]}}" required>
                                        <label class="form-check-label" for="{{$tecnica["tecnica_name"]}}">
                                            {{$tecnica["tecnica_name"]}}
                                        </label>
                                    </div>
                                        @if ($tecnica['tecnica_desc'] !== "vacio")
                                            <b>Descripción:</b>
                                            {!!$tecnica['tecnica_desc']!!}
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>


                        <div class="p-3 card bg-light mb-3" id="lugar">
                            <h4>Lugar</h4>
                            <p>*Tomado de Nina (2019)</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e0" value="Introducción" required>
                                <label class="form-check-label" for="e0">
                                    Introducción 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e1" value="Planteamiento del problema" required>
                                <label class="form-check-label" for="e1">
                                    Planteamiento del problema
                                </label>
                            </div> 
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e2" value="Justificación e importancia de la investigación" required>
                                <label class="form-check-label" for="e2">
                                    Justificación e importancia de la investigación
                                </label>
                            </div>  
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e3" value="Objetivos de la investigación  " required>
                                <label class="form-check-label" for="e3">
                                    Objetivos de la investigación   
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e4" value="Hipótesis de la investigación" required>
                                <label class="form-check-label" for="e4">
                                    Hipótesis de la investigación
                                </label>
                            </div>  
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e5" value="Variables" required>
                                <label class="form-check-label" for="e5">
                                    Variables 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e6" value="Fundamentación teórica" required>
                                <label class="form-check-label" for="e6">
                                    Fundamentación teórica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e7" value="Antecedentes de la investigación" required>
                                <label class="form-check-label" for="e7">
                                    Antecedentes de la investigación
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e8" value="Términos básicos" required>
                                <label class="form-check-label" for="e8">
                                    Términos básicos
                                </label>
                            </div> 
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e9" value="Metodología" required>
                                <label class="form-check-label" for="e9">
                                    Metodología  
                                </label>
                            </div>    

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e10" value="Fundamento epistemológico " required>
                                <label class="form-check-label" for="e10">
                                    Fundamento epistemológico 
                                </label>
                            </div>   


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e11" value="Método de investigación" required>
                                <label class="form-check-label" for="e11">
                                    Método de investigación
                                </label>
                            </div>  


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e12" value="Diseño de investigación" required>
                                <label class="form-check-label" for="e12">
                                    Diseño de investigación
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e13" value="Población y muestra" required>
                                <label class="form-check-label" for="e13">
                                    Población y muestra
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e14" value="Tipos de muestreo" required>
                                <label class="form-check-label" for="e14">
                                    Tipos de muestreo
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e15" value="Técnicas e instrumentos" required>
                                <label class="form-check-label" for="e15">
                                    Técnicas e instrumentos  
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e16" value="Análisis e interpretación de la información" required>
                                <label class="form-check-label" for="e16">
                                    Análisis e interpretación de la información
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e17" value="Recomendaciones" required>
                                <label class="form-check-label" for="e17">
                                    Recomendaciones
                                </label>
                            </div>  


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e18" value="Limitaciones" required>
                                <label class="form-check-label" for="e18">
                                    Limitaciones
                                </label>
                            </div>  


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e19" value="Referencias" required>
                                <label class="form-check-label" for="e19">
                                    Referencias 
                                </label>
                            </div>  

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lugar" id="e20" value="Anexos" required>
                                <label class="form-check-label" for="e20">
                                    Anexos 
                                </label>
                            </div>  

                        </div>


                        <div class="p-3 card bg-light mb-3" id="errores">
                            <h4>¿Errores? / Uso 000</h4>
                            <div id="errores_div"> 
                                @forelse ($errors as $error)
                                <div class="  " style="border: 1px solid rgba(0,0,0,.125); border-radius: 5px; margin-bottom:5px; background-color: #fff;">
                                    <input class="form-check-input" type="radio" name="error" id="{{ $error->error_id }}_for" value="{{ $error->error_id }}" required>
                                    <label class="form-check-label" for="{{ $error->error_id }}_for">
                                        {{ $error->error }}
                                    </label>
                                </div>
                                @empty
                                    <p>No errores</p>
                                @endforelse



                            </div> 

                            <hr id="errores_add">                         

                            <div >
                                <label for="exampleFormControlTextarea1" class="form-label"><h6 >Describe el error / Uso 000</h6></label>

                                <!--Este boton es el para ejecutar ej js-->
                                <input class="btn btn-outline-primary" type ="button" value=" + Agregar Error" id="boton" >
                                <textarea class="form-control mb-3" id="error_coment" rows="4" name="error_coment" ></textarea>
                            </div>


                            <br>
                            <br>
                            <p></p>

                            <div class="text-center">
                                <button class="btn btn-outline-dark" onclick="return confirm('¿Estás seguro de que deseas registrar una nueva entrada?');">Agregar</button> 
                            </div>

                            <!--Este imput tiene el id de la tesis-->
                            <input style="display:none;" type="text" name="tesis_id" value="<?php print_r($investigacion[0]['tesis_id']);?>" >
                        </div>
                    </form>

                    <div id="revision">
                        
                        <table class="table table-hover">
                            <thead>
                            
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Técnica</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">¿Errores?</th>
                                </tr>
                            </thead>

                            @forelse ($registros as $registro)
                            <tbody>
                                <tr>
                                    <td scope="col">{{$loop->iteration}}</td>
                                    <td scope="col">{{$registro['tecnica_name']}}</td>
                                    <td scope="col">{{$registro['lugar']}}</td>
                                    <td scope="col">
                                        {{$registro['error']}}
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                                <p>No analizados</p>
                            @endforelse
                        </table>
                    </div>                       





                    <div class="p-3 card bg-light mb-3" id="nivel">
                        <h4>Nivel de uso</h4>
                        Lizarzaburu et al. (2011)
                        <!---->
                        <form class=" formperfil uk-form-horizontal " action="{{route('nueva.revisado')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l0" value="Nivel 0" required>
                                <label class="form-check-label" for="l0">
                                    Nivel 0: No usa la estadística.
                                </label>
                            </div>

                            <hr>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l1" value="Nivel 1" required>
                                <label class="form-check-label" for="l1">
                                    Nivel 1: Presentación de datos en cuadros, gráficos, porcentaje y otras formas de presentación estadística.
                                </label>
                            </div>

                            <hr>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l2" value="Nivel 2" required>
                                <label class="form-check-label" for="l2">
                                    Nivel 2: Presentación de la información a través de medidas estadísticas y uso de técnicas estadísticas descriptivas.
                                </label>
                            </div>


                            <hr>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l3" value="Nivel 3" required>
                                <label class="form-check-label" for="l3">
                                    Nivel 3: Uso de pruebas de hipótesis estadísticas simples: paramétricas y no paramétricas, otras técnicas sencillas de análisis estadístico.
                                </label>
                            </div>




                            <hr>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l4" value="Nivel 4" required>
                                <label class="form-check-label" for="l4">
                                    Nivel 4: Uso de técnicas de análisis inferencial: Comparaciones múltiples, análisis de varianza, diversas técnicas inferenciales.
                                </label>
                            </div>


                            <hr>    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nivel" id="l5" value="Nivel 5" required>
                                <label class="form-check-label" for="l5">
                                    Nivel 5: Uso de estadística avanzada: Análisis multivariado, procesos estocásticos, modelos estadísticos lineales, diseño y análisis de experimentos, análisis factorial, otros temas de estadística avanzada.
                                </label>
                            </div>

                            <!--Este imput tiene el id de la tesis-->
                            <input style="display:none;" type="text" name="tesis_id" value="<?php print_r($investigacion[0]['tesis_id']);?>" >              
                            
                            <div class="text-center">
                                <button class="btn btn-outline-dark" onclick="return confirm('¿Estás seguro de que deseas clasificar esta investigación?');">Registar</button> 
                            </div>

                        </form>


                    </div>




                    </div>








                </div>        


        </div>


        <div class="col-7 mt-0 mb-0 ml-0 mr-0 pt-0 pb-0 pl-0 pr-0">
            <iframe src="http://127.0.0.1:8000/investigaciones/<?php print_r($investigacion[0]['archivo']);?>" width="100%" height="100%">
        </div> 







<!--  
<script>


    
    
    boton.addEventListener('click', function(e){
        e.preventDefault();//para evitar que se altualice la página al mandar el submit
        var datos = new FormData(formulario);
        fetch('/user/new_comment', {
            method: 'POST',
            headers:{
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            credentials: "same-origin",
            body: JSON.stringify({
                comentario: datos.get('comentario'),
                nombre: datos.get('nombre'),
                correo: datos.get('correo'),
                telefono: datos.get('telefono'),
                error: error,
                error: error_coment,
            })
        })
        .then( res => res.json( ) )
        .then( data => {
            console.log(data)
            if ( data==='error' ) {
                respuesta.innerHTML = `
                    <div id="" class="uk-alert-primary" uk-alert >
                        <a class="uk-alert-close" uk-close></a>
                        <p>Debes demostrar que no eres un Robot 🤖</p>
                    </div>
                `
            } else if (data==='bien') {
                formi.style.display = "none";

                respuestaEnv.innerHTML = `
                    <div id="" class="" >
                        <p>Formulario recibido. ¡Nos contactaremos contigo en breve! 🚀</p>
                    </div>
                    <button type="submit" class=" btn-modal  uk-text-bold text-btn uk-button uk-button-primary " onClick="window.location.href=window.location.href">Enviar otra solicitud</button>
                `

            }

        })
    });

</script>
-->









    </body>



</html>


