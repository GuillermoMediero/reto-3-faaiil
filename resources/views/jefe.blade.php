@extends('layouts.header_footer')
@section('rol')
    
    <div class="container"style="height:75vh">
        <h3 class="pt-3">Jefe</h3>
        @foreach ($incidencias as $incidencia)
        <h4>Nº : {{ $incidencia->as_serie }}</h4>
        @endforeach
    </div>
    
@endsection