@extends('layouts.header_footer')
@section('rol')

    <div class="container">
    <h3 class="pt-3 mt-3">Operador</h3>
        
            @foreach ($incidencias as $incidencia)
            @foreach ($ascensores as $ascensor)
                @if($ascensor->n_serie == $incidencia->as_serie)
        <div class="row mt-3">
            <div class="col-7">
                <div class="row border border-dark d-flex ">
                @if($incidencia->prioridad==0)
                        <div class="col-1 bg-danger "></div>
                    @elseif($incidencia->prioridad==1)
                        <div class="col-1 bg-warning "></div>
                    @else
                        <div class="col-1 bg-success "></div>
                    
                @endif
                    <div class=" col-1"></div>
                    <div class=" col-3 text-start align-self-center">
                        <h3>{{ $ascensor->direccion }}</h3>
                        <h4>Nº : {{ $incidencia->as_serie }}</h4>
                    </div>
                    <div class=" col-1 "></div>
                    <div class=" col-5 text-center align-self-center ">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    @if($incidencia->estado==0)
                        <button type="button" class="btn type{{$incidencia->id}} btn-outline-danger rounded-circle active ms-3" style="height:30px; width: 30px;"></button>
                        @else
                        <button type="button" disabled class="btn type{{$incidencia->id}} btn-outline-danger rounded-circle ms-3"style="height:30px; width: 30px;"></button>
                    @endif
                    @if($incidencia->estado==1)
                        <button type="button" class="btn type{{$incidencia->id}} btn-outline-warning rounded-circle active ms-3" style="height:30px; width: 30px;"></button>
                        @else
                        <button type="button" disabled class="btn type{{$incidencia->id}} btn-outline-warning rounded-circle ms-3" style="height:30px; width: 30px;"></button>
                    @endif
                    @if($incidencia->estado==2)
                        <button type="button" class="btn type{{$incidencia->id}} btn-outline-success rounded-circle active ms-3"  style="height:30px; width: 30px;"></button>
                        @else
                        <button type="button" disabled class="btn type{{$incidencia->id}} btn-outline-success rounded-circle ms-3"  style="height:30px; width: 30px;"></button>
                    @endif
                </div>
                    </div>
                    <div class="col-1 d-flex">
                        <button type="button" class="btn btn-outline-dark align-self-center " data-bs-toggle="collapse" data-bs-target="#colapsa{{$incidencia->id}} "aria-expanded="false" aria-controls="colapsa{{$incidencia->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-4 d-flex align-items-center border border-dark">

                <div class="row ">
                    <div class=" col-2"></div>
                    <div class=" col-8 align-self-center">
                        @foreach ($tecnicos as $tecnico)
                        @if( $incidencia->tecnico_id == $tecnico->id)
                    <h3>{{ $tecnico->name}}</h3>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">{{$tecnico->id}}</li>
                            <li class="list-group-item">{{$tecnico->email}}</li>
                        </ul>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-1"></div>
                    <div class=" col-1 d-flex">  
                        <button type="button" class="btn btn-outline-dark align-self-center " data-bs-toggle="collapse" data-bs-target="#colaps{{$incidencia->id}} "aria-expanded="false" aria-controls="colapsa{{$incidencia->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div id="colapsa{{$incidencia->id}}" class=" col-7 collapse border border-dark border-top-0 justify-self-start" >
            <div class=" card card-body border-0 ">
            <div class=" col-1 "></div>
            <div class=" col-11 ">
                <div class="row  justify-content-space-between">
                    <div class=" col-2 d-flex align-self-center"><h5>Fecha y hora</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5>Tipo</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5>Modelo</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5>Segmento</h5> </div> 
                    <div class=" col-2 d-flex align-self-center" ><h5>Detalles operario</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5>Detalles tecnico</h5> </div> 
                </div>
                <div class="row ">
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $incidencia->created_at }}</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $incidencia->tipo }}</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $ascensor->modelo_id }}</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $ascensor->segmento }}</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $incidencia->prioridad }}</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $incidencia->estado }}</h5> </div> 
                </div>
                </div>

            </div>
                            
        </div>

        <div id="colaps{{$incidencia->id}}" class=" col-4 collapse border border-dark border-top-0 ms-auto" >
            <div class=" card card-body border-0">
            <div class=" col-12 ">
                <div class="row ">
                    <div class=" col-2 d-flex "><h5>Cajas</h5> </div> 
                   
                </div>
                <div class="row ">
                    <div class=" col-2 d-flex align-self-center"><h5 class="me-5">{{ $incidencia->created_at }}</h5> </div> 
                    
                </div>
                </div>

            </div>
                            
        </div>
        </div>
        
                @endif
            @endforeach   
            @endforeach
            
        

        <div class="row d-flex mt-3 mb-3">
            <ul class="list-group list-group-horizontal justify-content-center" style="list-style-type: none;">
                <li class="page-item"><a class="page-link" href="#">Hoy</a></li>
                <li class="page-item"><a class="page-link" href="#">7 dias</a></li>
                <li class="page-item"><a class="page-link" href="#">Este mes</a></li>
                <li class="page-item"><a class="page-link" href="#">Todas</a></li>
            </ul>
        </div>  
        <div id="añadir" style="position: fixed;top:75vh;left:88vw">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creacion de Incidencias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-around p-md-3 m-md-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="n-serie">Nº serie</label>
                                        <input type="text" class="form-control" id="n-serie">
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion">
                                    </div>
                                    <!--
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="zona">Zona</label>
                                        <input type="text" class="form-control disabled" id="zona">
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="modelo">Modelo</label>
                                        <input type="text" class="form-control disabled" id="modelo"> 
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="marca">Marca</label>
                                        <input type="text" class="form-control disabled" id="marca">
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="segmentos">Segmentos</label>
                                        <select class="form-select" id="segmentos">
                                           
                                            <option selected value="Guipuzcoa">Guipuzcoa</option>
                                            <option selected value="Alava">Alava</option>
                                            <option selected value="Vizcaya">Vizcaya</option>
                                        </select>
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="tipoIncidencia">Tipo Incidencia</label>
                                        <select class="form-select" id="tipoIncidencia">
                                            <option selected value="Guipuzcoa">Guipuzcoa</option>
                                            <option selected value="Alava">Alava</option>
                                            <option selected value="Vizcaya">Vizcaya</option>
                                        </select>
                                    </div>
                                    <div class="col-6 text-center">
                                        <label class="form-label" for="tecnico">Tecnico</label>
                                        <select class="form-select" id="tecnico">
                                            <option selected value="Guipuzcoa">Guipuzcoa</option>
                                            <option selected value="Alava">Alava</option>
                                            <option selected value="Vizcaya">Vizcaya</option>
                                        </select>
                                    </div>
                                    <div class="col-12 text-center">
                                        <label class="form-label" for="detallesOp">Detalles Operador</label>
                                        <textarea class="form-control" id="detallesOp" rows="7"></textarea>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" id="buscar" value="Buscar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                    </div>
            
                </div>
            </div>
        </div>
        <script>
             $(document).on("click", '#buscar', function() {
              
                    var url = '{{ URL("home/busqueda") }}';
                    let n_serie = document.getElementById("n-serie").value;
                    let direccion = document.getElementById("direccion").value;
                    $.ajax({
                            url: url,
                                type: "GET",
                                cache: false,
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    "n_serie": n_serie,
                                    "direccion":direccion,
                                },
                                success: function(dataResult){
                                    ascensores = dataResult;
                                    if(ascensores != null)
                                    {
                                        document.getElementById('ascensores').innerHTML = 'hola';
                                    }
                                    else{
                                        alert("error de atun");
                                    }
                                }
                        });
                
            })
        </script>
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creacion de Incidencias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-label="Close"></button>
                    </div>
                    <div id="ascensores" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Close</button>
                        <button type="button" class="btn btn-primary">Crear Incidencia</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection