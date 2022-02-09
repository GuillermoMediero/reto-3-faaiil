@extends('layouts.header_footer')
@section('rol')
<div class="row" id="navegador"> 
          <ul class="p-3 row list-group list-group-horizontal justify-content-center" style="list-style-type: none;">
                <li class="col-1">
                    <a href="{{route('busqueda.show')}}" type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Operador</a>
                </li>
                <li class="col-1">
                    <a href="{{route('busqueda.show')}}" href="{{route('edit')}}" type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Jefe</a>
                </li>
                <li class="col-1">
                    <a href="{{route('busqueda.show')}}" type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Tecnico</a>
                </li>
                
            </ul>
 
</div>
    <div class="container"style="height:75vh">
        <h3 class="pt-3">Admin</h3>
    </div>
    <script>
                    $(".type").click(function(){
                        $(".type").removeClass("active");
                        $(this).addClass("active");
                    });
                </script>

<div id="añadir" style="position: fixed;top:75vh;left:88vw">
            <a href="{{route('home.crearusuario')}}" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
@endsection