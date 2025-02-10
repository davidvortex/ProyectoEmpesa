<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // Obtener el parámetro 'company' de la URL, predeterminado a 'empresa'
        $company = $request->input('company', 'empresa');

        // Obtener la conexión a la base de datos correcta según la empresa
        $dbConnection = $this->getDbConnection($company);

        // Obtener el total de ventas según la empresa seleccionada
        $totalVentas = $this->getTotalSales($dbConnection, $company);

        // Devolver la respuesta en JSON
        return response()->json([
            'company' => $company,
            'total_sales' => $totalVentas
        ]);
    }

    // Establecer la conexión a la base de datos correcta según la empresa
    private function getDbConnection(string $company)
    {
        switch ($company) {
            case 'empresa':
                return DB::connection('empresa');
            case 'empresa_2':
                return DB::connection('empresa_2');
            case 'empresa_3':
                return DB::connection('empresa_3');
            case 'empresa_4':
                return DB::connection('empresa_4');
            default:
                abort(404,"No hay base de datos: $company");
        }
    }

    // Obtener el total de ventas según la empresa seleccionada
    public function getTotalSales($dbConnection, string $company): float
    {
        switch ($company) {
            case 'empresa':
                return (float) $dbConnection->table('ventas')->sum('totalventas');
            case 'empresa_2':
                return (float) $dbConnection->table('ventas_2')->sum(DB::raw('subtotal + impuestos'));
            case 'empresa_3':
                return (float) $dbConnection->table('cotizacion')
                    ->join('ventas3', 'cotizacion.id_cotizacion', '=', 'ventas3.id_cotizacion')
                    ->sum('cotizacion.total_cotizacion');
            case 'empresa_4':
                $results = $dbConnection->table('cotizacion4')
                    ->leftJoin('conceptos_cotizacion', 'cotizacion4.id_cotizacion2', '=', 'conceptos_cotizacion.id_cotizacion2')
                    ->select('cotizacion4.id_cotizacion2', 'conceptos_cotizacion.total_concepto')
                    ->get();
                return (float) $results->sum('total_concepto');
            default:
                return 0;
        }
    }
}

