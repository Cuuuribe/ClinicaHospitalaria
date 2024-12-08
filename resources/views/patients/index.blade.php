@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Pacientes</h1>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">Crear Paciente</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
