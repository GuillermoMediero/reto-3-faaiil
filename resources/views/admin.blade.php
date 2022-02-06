@extends('layouts.header_footer')
@section('rol')
<div class="row" id="navegador"> 
          <ul class="p-3 row list-group list-group-horizontal justify-content-center" style="list-style-type: none;">
                <li class="col-1">
                    <button type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Operador</button>
                </li>
                <li class="col-1">
                    <button type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Jefe</button>
                </li>
                <li class="col-1">
                    <button type="button" class="type btn btn-outline-dark" style="width: 6vw;text-align:center;">Tecnico</button>
                </li>
                
            </ul>
 
</div>
    <div class="container"style="height:75vh">
        <h3 class="pt-3">Admin</h3>
        <div class="row d-flex mt-3 mb-3">
        <ul class="list-group list-group-horizontal justify-content-start" style="list-style-type: none;">
                <li class="page-item me-3" >
                    <button type="button" class="btn btn-outline-dark" style="width: 6vw;text-align:center;">Operador</button>
                </li>
                <li class="page-item me-3" >
                    <button type="button" class="btn btn-outline-dark" style="width: 6vw;text-align:center;">Jefe</button>
                </li>
                <li class="page-item me-3" >
                    <button type="button" class="btn btn-outline-dark" style="width: 6vw;text-align:center;">Tecnico</button>
                </li>
                
            </ul>
        </div>  
    </div>
    <script>
                    $(".type").click(function(){
                        $(".type").removeClass("active");
                        $(this).addClass("active");
                    });
                </script>
@endsection