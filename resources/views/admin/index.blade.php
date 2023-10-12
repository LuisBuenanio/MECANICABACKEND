@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p class="text-center text-bold py-8">Bienvenido al Panel de Administración.</p>
   
    <div class="text-center py-8">
        <img class ="  object-cover  object-left-bottom" src="{{asset('img/logos/logo-mecanica-color.png')}}" alt="">
          
        
    </div> 
@stop
@section('css')
    <style>
        .prueba{
            height: 600px;
            width: 540px;
            margin: auto;
            
        }
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop