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
<div class="container">
    <h1>Lista de productos</h1>
    <ul>
    @foreach ($productos as $producto)
        <li>Nombre: {{ $producto->nombre }}, Precio: {{ $producto->precio }} <a href="{{ route('productos.show' , $producto->id) }}">Ver detalles</a></li>
    @endforeach
    </ul>
    <p><a href="{{ route('productos.create') }}"  class="bg-primary text-white p-1">Añadir producto</a></p>
</div>
</form>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min
.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
</body>
</html>