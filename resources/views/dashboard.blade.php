<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <!-- Información de la Base de Datos -->
        <h2>Base de Datos Seleccionada: {{ $db_conexion }}</h2>
        <h3>Total de Ventas: <strong>${{ number_format($total_costos, 2) }}</strong></h3>

        <!-- Formulario para cambiar de base de datos -->
        <h2>Seleccionar otra base de datos:</h2>
        <form action="{{ route('dashboard.tablas') }}" method="POST">
            @csrf
            <label for="db_conexion">Base de Datos:</label>
            <select name="db_conexion" id="db_conexion">
                <option value="empresa" {{ $db_conexion == 'empresa' ? 'selected' : '' }}>Empresa</option>
                <option value="empresa_2" {{ $db_conexion == 'empresa_2' ? 'selected' : '' }}>Empresa 2</option>
                <option value="empresa_3" {{ $db_conexion == 'empresa_3' ? 'selected' : '' }}>Empresa 3</option>
                <option value="empresa_4" {{ $db_conexion == 'empresa_4' ? 'selected' : '' }}>Empresa 4</option>
            </select>
            <button type="submit">Ver Tablas</button>
        </form>

        <!-- Mostrar tablas si están disponibles -->
        @if(isset($tablas) && count($tablas) > 0)
            <h2>Tablas en la Base de Datos "{{ $db_conexion }}"</h2>
            <ul>
                @foreach ($tablas as $tabla)
                    <li>{{ $tabla }}</li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron tablas en la base de datos.</p>
        @endif
    </div>
    @endsection

</body>
</html>


