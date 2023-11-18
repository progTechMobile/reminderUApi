@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{__('Bienvenido! ')}}
                    <br>
                    <br>
                    <!-- Agrega un botón para abrir el formulario de creación de usuarios -->
                    <a href="{{ url('/user') }}" class="btn btn-success">Crear Usuario</a>

                    <!-- Agrega un botón para ver la lista de usuarios -->
                    <a href="{{ url('/user') }}" class="btn btn-info">Ver Lista de Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
