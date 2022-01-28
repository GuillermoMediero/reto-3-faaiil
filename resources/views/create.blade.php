@extends('layouts.master')
@section('contenido')    <h3>Añade un producto</h3>
    <form method="POST" action=" {{ route('productos.store') }}">
     @csrf   
        <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        <input type="text" id="precio" name="precio" placeholder="Precio">
        <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad">
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion">
        <input type="text" id="estado_id" name="estado_id" placeholder="Numero Estado">
        <input type="submit" value="Subir producto">
    </form>
    <p><a href="{{ route('productos.index')}}">Volver atras</a></p>
@endsection