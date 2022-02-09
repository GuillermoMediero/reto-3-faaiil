@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
    <h3 class="pt-3">Tecnico</h3>
    @if($nuevo ?? ''==true)
    <div class="alert alert-warning alert-dismissible fade show" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg>Hay nuevas incidencias<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @else
    <div class="alert alert-success alert-dismissible fade show" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg>No hay nuevas incidencias<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @foreach ($incidencias as $incidencia)
    @foreach ($ascensores as $ascensor)
        
        @if($ascensor->n_serie == $incidencia->as_serie && $incidencia->tecnico_id == Auth::user()->id)
        <div class="l{{$incidencia->id}}">
        <div class="row border border-dark d-flex mt-3 justify-content-center"style="min-height: 100px; ">
        @if($incidencia->prioridad==0)
                <div class="col-1 bg-danger "></div>
            @elseif($incidencia->prioridad==1)
                <div class="col-1 bg-warning "></div>
            @else
                <div class="col-1 bg-success "></div>
              
        @endif
            <div class=" col-1"></div>
            <div class=" col-4 text-start align-self-center">
                <h4>{{ $ascensor->direccion }}</h4>
                <h3>Nº : {{ $incidencia->as_serie }}</h3>
            </div>
            <div class=" col-1 "></div>
            <div class=" col-4 text-center align-self-center ">
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if($incidencia->estado==0)
                        <button type="button" id="d{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-danger rounded-circle active ms-3" style="height:30px; width: 30px;" value="{{$incidencia->id}}"></button>
                        @else
                        <button type="button" id="d{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-danger rounded-circle ms-3"style="height:30px; width: 30px;"value="{{$incidencia->id}}"></button>
                    @endif
                    @if($incidencia->estado==1)
                        <button type="button" id="w{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-warning rounded-circle active ms-3" style="height:30px; width: 30px;"value="{{$incidencia->id}}"></button>
                        @else
                        <button type="button" id="w{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-warning rounded-circle ms-3" style="height:30px; width: 30px;"value="{{$incidencia->id}}"></button>
                    @endif
                    @if($incidencia->estado==2)
                        <button type="button" id="s{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-success rounded-circle active ms-3"  style="height:30px; width: 30px;"value="{{$incidencia->id}}"></button>
                        @else
                        <button type="button" id="s{{$incidencia->id}}" class="btn type{{$incidencia->id}} btn-outline-success rounded-circle ms-3"  style="height:30px; width: 30px;"value="{{$incidencia->id}}"></button>
                    @endif
                </div>
                <script>
                    $(".type{{$incidencia->id}}").click(function(){
                        $(".type{{$incidencia->id}}").removeClass("active");
                        $(this).addClass("active");
                    });
                </script>
            </div>
            <div class="col-1 d-flex">
                <button type="button" class="btn btn-outline-dark align-self-center " data-bs-toggle="collapse" data-bs-target="#colapsa{{$incidencia->id}} "aria-expanded="false" aria-controls="colapsa{{$incidencia->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>
        <!--Hidden-->   
                        <div id="colapsa{{$incidencia->id}}" class="row collapse border border-dark border-top-0 " >
                            <div class=" card card-body ">
                        <div class=" col-1 "></div>
                            <div class=" col-11 align-self-end">
                                <div class="row d-flex">
                                    <div class=" col-2 d-flex align-self-center"><h5>Fecha y hora</h5> </div> 
                                    <div class=" col-2 d-flex align-self-center"><h5>Tipo</h5> </div> 
                                    <div class=" col-2 d-flex align-self-center"><h5>Modelo</h5> </div> 
                                    <div class=" col-2 d-flex align-self-center"><h5>Segmento</h5> </div> 
                                    <div class=" col-2 d-flex align-self-center" ><h5>Detalles operario</h5> </div> 
                                    <div class=" col-2 d-flex align-self-center"><h5>Detalles tecnico</h5> </div> 
                                </div>
                                <div class="row d-flex">
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
                        </div>
                        @endif
    @endforeach
    @endforeach
        <script>
                    $(document).on("click", '.btn-outline-danger', function() {
                        var url = '{{ URL("home/edit") }}';
                        var id = $(this).val();
                        $.ajax({
                            url: url,
                                type: "PATCH",
                                cache: false,
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    "id":id,
                                    "estado":'0',
                                },
                                success: function(dataResult){
                                    dataResult = JSON.parse(dataResult);
                                    if(dataResult.statusCode)
                                    {
                         
                                    }
                                    else{
                                        alert("error de atun");
                                    }
                                }
                        });
                     });
                    $(document).on("click", ".btn-outline-warning", function() {
                        var url = '{{ URL("home/edit") }}';
                        var id = $(this).val();
                        $.ajax({
                            url: url,
                                type: "PATCH",
                                cache: false,
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    "id":id,
                                    "estado":'1',
                                },
                                success: function(dataResult){
                                    dataResult = JSON.parse(dataResult);
                                    if(dataResult.statusCode)
                                    {
                                    }
                                    else{
                                        alert("error de atun");
                                    }
                                }
                        });
                     });
                    $(document).on("click", ".btn-outline-success", function() {
                        var url = '{{ URL("home/edit") }}';
                        var id = $(this).val();
                        $.ajax({
                            url: url,
                                type: "PATCH",
                                cache: false,
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    "id":id,
                                    "estado":'2',
                                },
                                success: function(dataResult){
                                    dataResult = JSON.parse(dataResult);
                                    if(dataResult.statusCode)
                                    {
                              
                                    }
                                    else{
                                        alert("error de atun");
                                    }
                                }
                        });
                     });
        </script>           
        <div class="row d-flex mt-3 mb-3">
            <ul class="list-group list-group-horizontal justify-content-center" style="list-style-type: none;">
                <li class="page-item"><a class="page-link" style="width: 90px;text-align:center;"href="#">Hoy</a></li>
                <li class="page-item"><a class="page-link" style="width: 90px;text-align:center;"href="#">7 dias</a></li>
                <li class="page-item"><a class="page-link" style="width: 90px;text-align:center;"href="#">Este mes</a></li>
                <li class="page-item"><a class="page-link" style="width: 90px;text-align:center;"href="#">Todas</a></li>
            </ul>
        </div>  
        
    </div>
@endsection