<!-- resources/views/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/user/' . $user->id) }}">
                            @csrf
                            @method('PUT') <!-- Utiliza PUT para actualizar un recurso -->

                            <!-- Agrega los campos del formulario con los valores actuales del usuario -->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Apellido</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
                            </div>

                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                            <!-- Agrega otros campos según sea necesario -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>

                        <!-- Botón para volver a la vista anterior -->
                        <a href="{{ url('/user') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
