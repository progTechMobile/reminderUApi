<!-- resources/views/store.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/user')  }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Apellido</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="role_id">Rol</label>
                                <select name="role_id" class="form-control" required>
                                    <!-- Aquí debes incluir las opciones para los roles, puedes obtenerlos de la base de datos -->
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                            <a href="{{ url('/home') }}" class="btn btn-secondary">Volver al Home</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
