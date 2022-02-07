@extends('layouts.header_footer')
@section('rol')
    
    <div class="container"style="height:75vh">
        <h3 class="pt-3">Jefe</h3>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row table-responsive">
                <div class="col-sm-12">
                <table class="table table-bordered border-primary table-success table-striped">
                    <thead class="table-dark text-white">
                    <th>Tipo Incidencia</th>
                    <th>Nº Resuelto</th>
                    </thead>
                    @foreach ($incidencias as $incidencia )
                    <tr>
                    <td>{{ $incidencia->tipo }}</td>
                    <td>{{ $incidencia->estado == 2}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                </div> 
            </div> 
            <!--Tabla-->
            <div class="col-sm-12 col-md-6">
                <div class="row table-responsive">
                <div class="col-sm-12">
                <table class="table table-bordered border-primary table-success table-striped">
                    <thead class="table-dark text-white">
                    <th>Tipo Incidencia</th>
                    <th>Nº Resuelto</th>
                    </thead>
                    @foreach ($incidencias as $incidencia )
                    <tr>
                    <td>{{ $incidencia->tipo }}</td>
                    <td>{{ $incidencia->estado == 2}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                </div> 
            </div> 
            <!--tabla-->
            <div class="col-sm-12 col-md-6">
                <div class="row table-responsive">
                <div class="col-sm-12">
                <table class="table table-bordered border-primary table-success table-striped">
                    <thead class="table-dark text-white">
                    <th>Tipo Incidencia</th>
                    <th>Nº Resuelto</th>
                    </thead>
                    @foreach ($incidencias as $incidencia )
                    <tr>
                    <td>{{ $incidencia->tipo }}</td>
                    <td>{{ $incidencia->estado == 2}</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                </div> 
            </div> 
        </div>
    </div>
    
@endsection