@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
        <div class="row">
            <ul class="col-5 col-md-2 mt-5 mb-5 list-group">
                <li class="list-group-item"><b> Id </b></li>
                <li class="list-group-item"><b> Nombre </b></li>
                <li class="list-group-item"><b> Email </b></li>
                <li class="list-group-item"><b> Rol </b></li>   
                @if($usuario->rol=='Tecnico' || $usuario->rol=='Jefe')
                    <li class="list-group-item"><b> Zona </b> </li>
                @endif
            </ul>
            <ul class="col-7 col-md-3 mt-5 mb-5 list-group">
                <li class="list-group-item"> {{$usuario->id}}</li>
                <li class="list-group-item">{{$usuario->name}}</li>
                <li class="list-group-item">{{$usuario->email}}</li>
                <li class="list-group-item"> {{$usuario->rol}}</li>   
                @if($usuario->rol=='Tecnico' || $usuario->rol=='Jefe')
                    <li class="list-group-item">{{$usuario->zona}}</li>
                @endif
            </ul>
        </div>
    </div>
@endsection