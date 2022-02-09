@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
        <form method="post" action="{{ route('home.guardarincidencia') }}" class="row">
            @csrf
            <ul class="col-2 mt-5 mb-5 list-group">
                <li class="list-group-item"><b> Nº serie </b></li>
                <li class="list-group-item"><b> Prioridad </b></li>
                <li class="list-group-item"><b> Estado </b></li>
                <li class="list-group-item"><b> Detalles operador </b></li>   
                <li class="list-group-item disabled"><b> tecnico_id </b></li>   
            </ul>
            <ul class="col-3 mt-5 mb-5 list-group">
                <li  class="list-group-item"> 
                    <select name="n_serie">
                        @foreach($ascensores as $ascensor)
                            <option value="{{$ascensor->n_serie}}">{{$ascensor->n_serie}}</option> 
                        @endforeach
                    </select> 
                </li>
                <li class="list-group-item">

                    <input type="radio" name="prioridad" value="0">Urgente
                    <input type="radio" name="prioridad" value="1">Media
                    <input type="radio" name="prioridad" value="2">Normal
                </li>
                <li class="list-group-item "><input name ="estado" value="Sin comenzar"type="text" disabled></li>
                <li  class="list-group-item"><input name="detalles_op" type="text"></li>
                <li class="list-group-item "><input name ="tecnico" value="Autoasignado"type="text" disabled></li>
                
            </ul>
            <button class="type btn btn-outline-dark" type="submit">Crear incidencia</button>
</form>
    </div>
@endsection