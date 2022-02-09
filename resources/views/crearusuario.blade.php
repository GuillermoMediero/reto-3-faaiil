@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
        <form method="post" action="{{ route('home.guardarusuario') }}" class="row">
            @csrf
            <ul class="col-2 mt-5 mb-5 list-group">
                <li class="list-group-item"><b> Nombre </b></li>
                <li class="list-group-item"><b> Email </b></li>
                <li class="list-group-item"><b> Contraseña </b></li>
                <li class="list-group-item"><b> Rol </b></li>   
                <li class="list-group-item "><b> Zona </b></li>   
            </ul>
            <ul class="col-3 mt-5 mb-5 list-group">
                <li  class="list-group-item"><input name="name" type="text"></li>
                <li class="list-group-item"><input name="email" type="text"></li>
                <li class="list-group-item"><input name ="contrasena" type="password"></li>
                <li class="list-group-item"> 
                    <select name="rol">
                        <option value="Jefe">Jefe</option> 
                        <option value="Operador">Operador</option> 
                        <option value="Tecnico">Tecnico</option>
                    </select> 
                </li>
                <li class="list-group-item">
                    <select name="zona">
                        <option value="Arriaga">Arriaga</option> 
                        <option value="Lakua">Lakua</option> 
                        <option value="Sansomendi">Sansomendi</option>
                        <option value="Ibaiondo">Ibaiondo</option> 
                        <option value="Zabalgana">Zabalgana</option> 
                    </select> </li>
            </ul>
            <button class="type btn btn-outline-dark" type="submit">Crear usuario</button>
</form>
    </div>
@endsection