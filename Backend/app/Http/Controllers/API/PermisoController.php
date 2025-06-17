<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\PermisoResource;

class PermisoController extends BaseController
{
    public function index(): JsonResponse
    {
        $permisos = Permiso::all();
        return $this->sendResponse(PermisoResource::collection($permisos), 'Permisos listados correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'descripcion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }
        $permiso = Permiso::create($input);
        return $this->sendResponse(new PermisoResource($permiso), 'Permiso creado correctamente.');
    }

    public function show($id): JsonResponse
    {
        $permiso = Permiso::find($id);
        if (is_null($permiso)) {
            return $this->sendError('Permiso no encontrado.');
        }
        return $this->sendResponse(new PermisoResource($permiso), 'Permiso obtenido correctamente.');
    }

    public function update(Request $request, Permiso $permiso): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'descripcion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $permiso->update($input);
        return $this->sendResponse(new PermisoResource($permiso), 'Permiso actualizado correctamente.');
    }

    public function destroy(Permiso $permiso): JsonResponse
    {
        $permiso->delete();
        return $this->sendResponse([], 'Permiso eliminado correctamente.');
    }
}