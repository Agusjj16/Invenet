<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\OrdenReparacion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\OrdenReparacionResource;

class OrdenReparacionController extends BaseController
{
    public function index(): JsonResponse
    {
        $ordenes = OrdenReparacion::all();
        return $this->sendResponse(OrdenReparacionResource::collection($ordenes), 'Órdenes de reparación listadas correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'fecha_orden' => 'required|date',
            'fecha_reparacion' => 'nullable|date',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $orden = OrdenReparacion::create($input);

        return $this->sendResponse(new OrdenReparacionResource($orden), 'Orden de reparación creada correctamente.');
    }

    public function show($id): JsonResponse
    {
        $orden = OrdenReparacion::find($id);

        if (is_null($orden)) {
            return $this->sendError('Orden de reparación no encontrada.');
        }

        return $this->sendResponse(new OrdenReparacionResource($orden), 'Orden obtenida correctamente.');
    }

    public function update(Request $request, OrdenReparacion $orden_reparacion): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'fecha_orden' => 'required|date',
            'fecha_reparacion' => 'nullable|date',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $orden_reparacion->update($input);

        return $this->sendResponse(new OrdenReparacionResource($orden_reparacion), 'Orden de reparación actualizada correctamente.');
    }

    public function destroy(OrdenReparacion $orden_reparacion): JsonResponse
    {
        $orden_reparacion->delete();

        return $this->sendResponse([], 'Orden de reparación eliminada correctamente.');
    }
}