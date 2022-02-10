@extends('layouts.header_footer')
@section('rol')
    
    <div class="container">
        <form method="post" action="{{ route('home.guardarusuario') }}" class="row">
            @csrf
            <ul class="col-4 mt-5 mb-5 list-group">
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Nombre </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Email </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Contraseña </b></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Rol </b></li>   
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><b> Zona </b></li>   
            </ul>
            <ul class="col-8 col-md-5 mt-5 mb-5 list-group">
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name="name" type="text"></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name="email" type="text"></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"><input name ="contrasena" type="password"></li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;"> 
                    <select name="rol" style="width: 12.5rem">
                        <option value="Jefe">Jefe</option> 
                        <option value="Operador">Operador</option> 
                        <option value="Tecnico">Tecnico</option>
                    </select> 
                </li>
                <li class="list-group-item d-flex align-items-center" style="height:7vh;">
                    <select name="zona" style="width: 12.5rem">
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