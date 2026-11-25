<?php

namespace App\Controllers;

use App\Models\Empleado;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EmpleadoController
{
    // Función para enviar respuestas en formato JSON
    private function respuesta(Response $response, array $datos, int $codigo = 200): Response
    {
        $response->getBody()->write(
            json_encode($datos, JSON_UNESCAPED_UNICODE)
        );

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($codigo);
    }

    // LISTAR TODOS LOS EMPLEADOS
    public function index(Request $request, Response $response): Response
    {
        $empleados = Empleado::all();

        return $this->respuesta($response, [
            'mensaje' => 'Lista de empleados',
            'datos' => $empleados
        ]);
    }

    // CONSULTAR UN EMPLEADO POR SU ID
    public function show(Request $request, Response $response, array $args): Response
    {
        $empleado = Empleado::find($args['id']);

        if (!$empleado) {
            return $this->respuesta($response, [
                'error' => 'Empleado no encontrado'
            ], 404);
        }

        return $this->respuesta($response, [
            'datos' => $empleado
        ]);
    }

    // REGISTRAR UN EMPLEADO
    public function store(Request $request, Response $response): Response
    {
        $datos = json_decode((string) $request->getBody(), true);

        $camposObligatorios = [
            'nombres',
            'apellidos',
            'documento',
            'correo',
            'telefono',
            'cargo',
            'area',
            'fecha_ingreso'
        ];

        foreach ($camposObligatorios as $campo) {
            if (empty($datos[$campo])) {
                return $this->respuesta($response, [
                    'error' => "El campo $campo es obligatorio"
                ], 400);
            }
        }

        $empleado = Empleado::create($datos);

        return $this->respuesta($response, [
            'mensaje' => 'Empleado registrado correctamente',
            'datos' => $empleado
        ], 201);
    }

    // ACTUALIZAR UN EMPLEADO
    public function update(Request $request, Response $response, array $args): Response
    {
        $empleado = Empleado::find($args['id']);

        if (!$empleado) {
            return $this->respuesta($response, [
                'error' => 'Empleado no encontrado'
            ], 404);
        }

        $datos = json_decode((string) $request->getBody(), true);

        $empleado->fill($datos);
        $empleado->save();

        return $this->respuesta($response, [
            'mensaje' => 'Empleado actualizado correctamente',
            'datos' => $empleado
        ]);
    }

    // ELIMINAR UN EMPLEADO
    public function delete(Request $request, Response $response, array $args): Response
    {
        $empleado = Empleado::find($args['id']);

        if (!$empleado) {
            return $this->respuesta($response, [
                'error' => 'Empleado no encontrado'
            ], 404);
        }

        $empleado->delete();

        return $this->respuesta($response, [
            'mensaje' => 'Empleado eliminado correctamente'
        ]);
    }
}
