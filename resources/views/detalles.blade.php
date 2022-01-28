<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
@if (Auth::guest())
    <p>Si deseas ver los detalles <a href="{{ route('home') }}">Haz login</a></p>
    <p><a href="{{ route('productos.index')}}">Volver atras</a></p>                 
@else
    <h1>Detalles del producto con el id {{$detalles->id}}</h1>
        <p>Nombre: {{ $detalles->nombre }}</p>
        <p>Precio: {{ $detalles->precio }}</p>
        <p>Cantidad: {{ $detalles->cantidad }}</p>
        <p>Descripcion: {{ $detalles->descripcion }}</p>

        <p><a href="{{ route('productos.index')}}">Volver atras</a></p>
        <form method="POST" action="{{ route('productos.destroy', $detalles->id) }}">
            @csrf
            @method("DELETE")
     
        <button type="submit">Eliminar</button>
@endif
</div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min
.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
</body>
</html>