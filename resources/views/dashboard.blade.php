<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Ventas</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #54839D;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .kpi {
            font-size: 36px;
            color: #54839D;
            font-weight: bold;
        }
        .form-group {
            margin: 20px 0;
        }
        .select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .button {
            background-color: #54839D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button:hover {
            background-color: #3a5c70;
        }
    </style>
</head>
<body>

<header>
    Dashboard de Ventas - KPI
</header>

<div class="container">
    <h2>Ventas Totales de la Empresa</h2>
    <!-- Mostrar el total de ventas -->
    <p class="kpi">${{ number_format($totalVentas, 2) }}</p>

    <!-- Formulario para seleccionar empresa -->
    <form action="{{ url('/dashboard') }}" method="GET">
        <div class="form-group">
            <label for="company">Seleccionar Empresa:</label>
            <select name="company" id="company" class="select">
                <option value="empresa" {{ $company == 'empresa' ? 'selected' : '' }}>Empresa 1</option>
                <option value="empresa_2" {{ $company == 'empresa_2' ? 'selected' : '' }}>Empresa 2</option>
                <option value="empresa_3" {{ $company == 'empresa_3' ? 'selected' : '' }}>Empresa 3</option>
                <option value="empresa_4" {{ $company == 'empresa_4' ? 'selected' : '' }}>Empresa 4</option>
            </select>
        </div>
        <button type="submit" class="button">Actualizar KPI</button>
    </form>
</div>

</body>
</html>

