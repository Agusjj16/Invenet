<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\SalaResource;

class SalaController extends BaseController
{
    public function index(): JsonResponse
    {
        $salas = Sala::all();
        return $this->sendResponse(SalaResource::collection($salas), 'Salas listadas correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $sala = Sala::create($input);

        return $this->sendResponse(new SalaResource($sala), 'Sala creada correctamente.');
    }

    public function show($id): JsonResponse
    {
        $sala = Sala::find($id);

        if (is_null($sala)) {
            return $this->sendError('Sala no encontrada.');
        }

        return $this->sendResponse(new SalaResource($sala), 'Sala obtenida correctamente.');
    }

    public function update(Request $request, Sala $sala): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $sala->update($input);

        return $this->sendResponse(new SalaResource($sala), 'Sala actualizada correctamente.');
    }

    public function destroy(Sala $sala): JsonResponse
    {
        $sala->delete();

        return $this->sendResponse([], 'Sala eliminada correctamente.');
    }
}
