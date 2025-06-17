<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\DispositivoResource;

class DispositivoController extends BaseController
{
    public function index(): JsonResponse
    {
        $dispositivos = Dispositivo::all();

        return $this->sendResponse(DispositivoResource::collection($dispositivos), 'Dispositivos listados correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'tipo' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'componentes' => 'nullable|string|max:255',
            'num_serie' => 'required|string|unique:dispositivos,num_serie',
        ]);

        if($validator->fails()){
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $dispositivo = Dispositivo::create($input);

        return $this->sendResponse(new DispositivoResource($dispositivo), 'Dispositivo creado correctamente.');
    }

    public function show($id): JsonResponse
    {
        $dispositivo = Dispositivo::find($id);

        if (is_null($dispositivo)) {
            return $this->sendError('Dispositivo no encontrado.');
        }

        return $this->sendResponse(new DispositivoResource($dispositivo), 'Dispositivo obtenido correctamente.');
    }

    public function update(Request $request, Dispositivo $dispositivo): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'tipo' => 'sometimes|required|string|max:255',
            'sala_id' => 'sometimes|required|exists:salas,id',
            'estado' => 'sometimes|required|string|max:255',
            'marca' => 'sometimes|required|string|max:255',
            'fecha_ingreso' => 'sometimes|required|date',
            'componentes' => 'nullable|string|max:255',
            'num_serie' => 'sometimes|required|string|unique:dispositivos,num_serie,' . $dispositivo->id,
        ]);

        if($validator->fails()){
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $dispositivo->update($input);

        return $this->sendResponse(new DispositivoResource($dispositivo), 'Dispositivo actualizado correctamente.');
    }

    public function destroy(Dispositivo $dispositivo): JsonResponse
    {
        $dispositivo->delete();

        return $this->sendResponse([], 'Dispositivo eliminado correctamente.');
    }
}
