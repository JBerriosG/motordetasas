@extends('adminlte::page')

@section('title', 'CRUD con laravel 8')

@section('content_header')
    <h1>Editar tasa</h1>
@stop

@section('content')
<form action="/articulos/{{ $articulo->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" tabindex="1" value="{{ $articulo->codigo }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" tabindex="2" value="{{ $articulo->descripcion }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" tabindex="3" value="{{ $articulo->cantidad }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="any" value="{{ $articulo->precio }}">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Submit</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop