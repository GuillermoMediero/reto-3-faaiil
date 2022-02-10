

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
                    <div class=" col-5 text-start align-self-center">
                        <h5>{{ $ascensor->direccion }}</h5>
                        <h4>Nº : {{ $incidencia->as_serie }}</h4>
                    </div>
                    
                    <div class=" col-3 text-center align-self-center ">
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
            <div class="col-4   border border-dark">

                <div class="row d-flex align-self-center" style="height: 100%;">
                    <div class=" col-1"></div>
                    <div class=" col-8 align-self-center justify-self-center">
                        @foreach ($tecnicos as $tecnico)
                        @if( $incidencia->tecnico_id == $tecnico->id)
                    <h3>{{$tecnico->name}}</h3>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">{{$tecnico->id}}</li>
                            <li class="list-group-item">{{$tecnico->email}}</li>
                        </ul>
                        @endif
                        @endforeach
                    </div>
                    <div class=" col-1"></div>
                    <div class=" col-2 d-flex">  
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
            <div class=" card card-body border-0 bg-white ">
            <div class=" col-1 "></div>
            <div class=" col-11 ">
                <div class="row  justify-content-space-between">
                    <div class=" col-4 d-flex align-self-center"><h5>Fecha y hora</h5> </div> 
                    <div class=" col-3 d-flex align-self-center"><h5>Tipo</h5> </div> 
                    <div class=" col-2 d-flex align-self-center"><h5>Modelo</h5> </div> 
                    <div class=" col-3 d-flex align-self-center"><h5>Segmento</h5> </div> 
                </div>
                <div class="row ">
                    <div class=" col-4 d-flex align-self-center"><p class="me-5">{{ $incidencia->created_at }}</p> </div> 
                    <div class=" col-3 d-flex align-self-center"><p class="me-5">{{ $incidencia->tipo }}</p> </div> 
                    <div class=" col-2 d-flex align-self-center"><p class="me-5">{{ $ascensor->modelo_id }}</p> </div> 
                    <div class=" col-3 d-flex align-self-center"><p class="me-5">{{ $ascensor->segmento }}</p> </div> 
                </div>
                </div>

            </div>
                            
        </div>

        <div id="colaps{{$incidencia->id}}" class=" col-4 collapse border border-dark border-top-0 ms-auto" >
            <div class=" card card-body border-0 bg-white">
            <ul class="list-group col-12  ">
                <?php
                    foreach($tecnicos as $tecnico){
                        if($tecnico->zona == $ascensor->zona_id){
                        ?>
                        <div class="row ">
                            <li class="bg-white list-group-item col-12 d-flex align-self-center"><a href="{{ route('store',['idtecnico' => $tecnico->id,'idincidencia' => $incidencia->id]) }}" class=" text-decoration-none"><h5 class="me-5">{{  $tecnico->name }}</h5></a> </li> 
                        </div>
                        <?php
                        }
                    }  
                ?>
                </div>

                </ul>
                            
        </div>
        </div>
        
                @endif
            @endforeach   
            @endforeach
            
        
        <div id="añadir" style="position: fixed;top:75vh;left:88vw">
        <a href="{{route('home.crearincidencia')}}" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
      
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalles de la incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-label="Close"></button>
                    </div>
                    <div id="ascensores" class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6 text-center">
                                <label class="form-label" for="n-serie">Nº serie</label>
                                <input type="text" class="form-control" name="n-serie" id="n-serie">
                            </div>
                            <div class="col-6 text-center">
                                <label class="form-label" for="direccion">Direccion</label>
                                <input type="text" class="form-control" id="direccion">
                            </div>
                            <div class="col-12 mt-3 text-center">
                                <button class="btn border border-dark"type="submit">Buscar</button>
                            
                            </div>
                        </div>
                        <ul class="list-group">
                        <?php
                            foreach($ascensores as $ascensor){
                            if(str_contains($ascensor->n_serie,$ascensor->zona_id)){
                        ?>
                            <div class="row ">
                                <li class=" list-group-item col-12 d-flex align-self-center"><a href="{{ route('store',['idtecnico' => $tecnico->id,'idincidencia' => $incidencia->id]) }}" class="text-dark text-decoration-none"><h5 class="me-5">{{  $tecnico->name }}</h5></a> </li> 
                            </div>
                        <?php
                                }
                            }  
                        ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                    <button id="insercion" class="btn btn-secundary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">cancelar</button>
                     <input type="submit" id="Siguiente" value="detallar" data-bs-dismiss="modal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">                    
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creacion de Incidencias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-label="Close"></button>
                    </div>
                    <div id="ascensores2" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Close</button>
                        <button type="button" class="btn btn-primary">Crear Incidencia</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">confirmar datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    esto es una prueba de confirmacion de datos
                </div>
                <div class="modal-footer">
                <button id="insercion" class="btn btn-secundary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">cancelar</button>
                <button id="insercion" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">insertar incidencia</button>
                </div>
                </div>
            </div>
            </div>
    </div>
@endsection