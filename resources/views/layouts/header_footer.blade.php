<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">

          <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon top-bar"></span>
              <span class="toggler-icon middle-bar"></span>
              <span class="toggler-icon bottom-bar"></span>
            </button>
          <h1 class="text-white">Igobide</h1>

          <div class="dropdown">
            <a class="dropdown" href="#" id="perfil" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </a>
          
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfil">
              <li class="dropdown-item active">Nombre</li>
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Cerrar Session</a></li>
            </ul>
          </div>
			  </nav>
        </div>
        <div class="row bg-light">
          <div class="text-center p-2 col-12"> 
            <form class="d-flex justify-content-center">
            @if(Auth::user()->rol=="Tecnico")
					  <input class="form-control me-2" type="search" id="buscarIncidencia" placeholder="Search" aria-label="Search" style="width:350px">
            @else
            <input class="form-control me-2" type="search" id="buscarZona" placeholder="Search" aria-label="Search" style="width:350px">
            @endif
					  <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					  </svg></button>

            <div class="ps-2 color-danger">
              <button type="button" id="prioridad" class="border-0 bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
              </svg></button>
            </div>
            <script>
              $(document).on("click", "#prioridad", function() {
                        var url = '{{ URL("/home/prioridad") }}';
                        var id= 
                        $.ajax({
                            url: url,
                                type: "PATCH",
                                cache: false,
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    "prioridad":'0',
                                },
                                success: function(dataResult){
                                    $prioritarias = dataResult;
                                    if($prioritarias!=null)
                                    {
                                      window.location = "/home",[$prioritarias];
                                    }
                                    else{
                                        alert("error de sardina");
                                    }
                                }
                        });
                     });
            </script>
					  </form>

          </div>
        </div>
        <div class="row ">
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body  ">
              <div id="navbar">
                <ul class="navbar-nav me-auto my-2 my-lg-0 ml-auto" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="#">Categoria</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item fixed-bottom pb-3 float-end">
                    <hr>
                    <a class="navbar-brand text-danger ps-3" href="{{ route('logout') }}">Logout</a>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min
          .js" integrity="sha384-
          ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
          <script>$(document).ready(function(){
            $(".menu").click(function(){
                $(".keep").toggleClass("width");
            });
          });</script> 
<script>
  var path = "{{ url('autocomplete-search-zona') }}";

    $('#buscarZona').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });

        }

    });
</script>
<script>
  var rut = "{{ url('autocomplete-search-tipo') }}";

  $('#buscarIncidencia').typeahead({

  source: function(query, process){

      return $.get(rut, {query:query}, function(data){

          return process(data);

      });

  }

  });
</script>
              <div class="col-12">
                @yield('rol')
              </div>
          </div> 
          <footer class="row bg-dark text-center text-white">
            <nav class="navbar navbar-dark bg-dark">
              <div class="text-center p-1 ">
                <a class="nav-link text-white" href="#">Contacte al jefe</a>
              </div>
              <div  class="text-center bg- p-1 ">
                <a class="nav-link text-white" href="">© 2022 Creative Commons: Igobide <img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
              </div>
              <div class="text-center p-1">
                <a class="nav-link text-white" href="#">Manual de la aplicacion</a>
              </div>
             </nav>

 
          </footer>
        </div>
    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min
.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>

</body>
</html>