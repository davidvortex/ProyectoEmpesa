<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

enum DatabaseConnection: string
{
    case EMPRESA = 'empresa';
    case EMPRESA_2 = 'empresa_2';
    case EMPRESA_3 = 'empresa_3';
    case EMPRESA_4 = 'empresa_4';

    public static function fromString(string $value): self
    {
        return match ($value) {
            'empresa' => self::EMPRESA,
            'empresa_2' => self::EMPRESA_2,
            'empresa_3' => self::EMPRESA_3,
            'empresa_4' => self::EMPRESA_4,
            default => throw new \InvalidArgumentException("No hay base de datos con el nombre: $value"),
        };
    }
}

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $db_conexion = $request->input('db_conexion', 'empresa');

        try {
            $db_enum = DatabaseConnection::fromString($db_conexion);
            $db_conectado = $this->getDbConnection($db_enum);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => "Tenemos un problema: " . $e->getMessage()]);
        }

        $total_costos = $this->getTotalSales($db_conectado, $db_enum);
        $tablas = $this->getTables($db_conectado);

        return view('dashboard', [
            'db_conexion' => $db_enum->value,
            'total_costos' => $total_costos,
            'tablas' => $tablas
        ]);
    }

    private function getDbConnection(DatabaseConnection $db_conexion)
    {
        return DB::connection($db_conexion->value);
    }

    public function getTotalSales($db_conectado, DatabaseConnection $db_conexion): float
    {
        return match ($db_conexion) {
            DatabaseConnection::EMPRESA => (float) ($db_conectado->table('ventas')->sum('totalventas') ?? 0),
            DatabaseConnection::EMPRESA_2 => (float) ($db_conectado->table('ventas_2')->sum(DB::raw('subtotal + impuestos')) ?? 0),
            DatabaseConnection::EMPRESA_3 => (float) ($db_conectado->table('ventas3')
                ->join('cotizacion', 'ventas3.id_cotizacion', '=', 'cotizacion.id_cotizacion')
                ->sum('cotizacion.total_cotizacion') ?? 0),
            DatabaseConnection::EMPRESA_4 => (float) ($db_conectado->table('cotizacion4')
                ->join('conceptos_cotizacion', 'cotizacion4.id_cotizacion2', '=', 'conceptos_cotizacion.id_cotizacion2')
                ->sum('conceptos_cotizacion.total_concepto') ?? 0),
        };
    }
    public function showTables(Request $request): JsonResponse
    {
        try {
            // Validar que el usuario envió una base de datos válida
            $request->validate([
                'db_conexion' => 'required|in:empresa,empresa_2,empresa_3,empresa_4'
            ]);

            $db_conexion = $request->input('db_conexion');
            $db_enum = DatabaseConnection::fromString($db_conexion);
            $db_conectado = $this->getDbConnection($db_enum);

            // Obtener las tablas de la base de datos
            $tablas = $db_conectado->select("SHOW TABLES");

            // Extraer nombres de las tablas correctamente
            $lista_tablas = array_map(fn($tabla) => array_values((array) $tabla)[0], $tablas);

            return response()->json([
                'db_conexion' => $db_enum->value,
                'tablas' => $lista_tablas
            ], 200, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno en el servidor',
                'mensaje' => $e->getMessage()
            ], 500);
        }
    }


    public function getTables($db_conectado)
    {
        try {
            $tablas = $db_conectado->select("SHOW TABLES");
            return array_map(fn($tabla) => array_values((array) $tabla)[0], $tablas);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function showEjercicio(Request $request)
    {
        return $this->index($request);
    }
}
