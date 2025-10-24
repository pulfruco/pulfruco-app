@extends('layouts.app')
@section('title', 'Panel de Administración')
@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
        <hr>
        <p class="lead">Este es el panel administrativo de PULFRUCO.</p>
        
        <div class="alert alert-success">
            **Éxito:** Solo ves esta página porque has iniciado sesión (Middleware `auth`).
        </div>
        
        <div class="card card-body">
            <h5 class="card-title">Próximos Pasos (Fase 4)</h5>
            <p class="card-text">Aquí se añadirán los enlaces para gestionar las Líneas y los Productos.</p>
            <a href="#" class="btn btn-pulfruco-primary disabled">Gestionar Productos (Fase 4)</a>
        </div>
    </div>
@endsection