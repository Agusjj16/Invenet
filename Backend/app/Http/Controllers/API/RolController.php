<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\RolResource;

class RolController extends BaseController
{
    public function index(): JsonResponse
    {
        $roles = Rol::all();
        return $this->sendResponse(RolResource::collection($roles), 'Roles listados correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'descripcion' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $rol = Rol::create($input);

        return $this->sendResponse(new RolResource($rol), 'Rol creado correctamente.');
    }

    public function show($id): JsonResponse
    {
        $rol = Rol::find($id);

        if (is_null($rol)) {
            return $this->sendError('Rol no encontrado.');
        }

        return $this->sendResponse(new RolResource($rol), 'Rol obtenido correctamente.');
    }

    public function update(Request $request, Rol $rol): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'descripcion' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $rol->update($input);

        return $this->sendResponse(new RolResource($rol), 'Rol actualizado correctamente.');
    }

    public function destroy(Rol $rol): JsonResponse
    {
        $rol->delete();

        return $this->sendResponse([], 'Rol eliminado correctamente.');
    }
}
