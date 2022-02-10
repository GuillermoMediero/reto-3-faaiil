@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
        <form method="post" action="{{ route('home.guardarincidencia') }}" class="row">
            @csrf
            <ul class="col-4 mt-5 mb-5 list-group">
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Nº serie </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Prioridad </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Estado </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Detalles operador </b></li>   
                <li class="list-group-item d-flex align-items-center disabled" style="height:7vh;"><b> tecnico_id </b></li>   
            </ul>
            <ul class="col-8 col-md-5 mt-5 mb-5 list-group">
                <li  class="list-group-item d-flex align-items-center" style="height:7vh;"> 
                    <select name="n_serie">
                        @foreach($ascensores as $ascensor)
                            <option value="{{$ascensor->n_serie}}">{{$ascensor->n_serie}}</option> 
                        @endforeach
                    </select> 
                </li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;">
                    <div class="d-inline-block me-3"><input type="radio" class="me-1" name="prioridad" value="0">Urgente   </div>
                    <div class="d-inline-block me-3"><input type="radio" class="me-1" name="prioridad" value="1">Media   </div>
                    <div class="d-inline-block me-3"><input type="radio" class="me-1" name="prioridad" value="2">Normal   </div>


                </li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name ="estado" value="Sin comenzar"type="text" disabled></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name="detalles_op" type="text"></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name ="tecnico" value="Autoasignado"type="text" disabled></li>
                
            </ul>
            <button class="type btn btn-outline-dark" type="submit">Crear incidencia</button>
</form>
    </div>
@endsection