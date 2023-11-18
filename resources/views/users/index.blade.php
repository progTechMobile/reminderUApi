<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Usuarios') }}</div>

                    <div class="card-body">
                        <!-- Agregar el botón para imprimir en PDF al inicio -->
                        <a href="{{ url('/user/pdf') }}" class="btn btn-primary mb-2">Imprimir en PDF</a>

                        <!-- Botón para agregar un nuevo usuario -->
                        <a href="{{ url('/user') }}" class="btn btn-success mb-2">Agregar Usuario</a>

                        @if(count($users) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo Electrónico</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>
                                                <!-- Agregar enlaces para ver, editar o eliminar usuarios -->
                                                <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-warning">Editar</a>
                                                <form method="POST" action="{{ url('/user/' . $user->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay usuarios registrados.</p>
                        @endif

                        <!-- Botón para volver al home -->
                        <a href="{{ url('/home') }}" class="btn btn-secondary">Volver al Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
