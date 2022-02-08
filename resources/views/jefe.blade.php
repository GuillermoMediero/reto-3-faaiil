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
                    <td>{{ $incidencia->estado})</td>
                    </tr>
                    @endforeach
                </table>
                </div>
                </div> 
            </div> 
            <!--Tabla-->
        </div>
    </div>
   <!-- <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Estatica', 'Electrica', 'Yellow'],
                datasets: [{
                    label: 'Eficacia de los tecnicos',
                    data: $incidencia->estado,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>-->
    
@endsection