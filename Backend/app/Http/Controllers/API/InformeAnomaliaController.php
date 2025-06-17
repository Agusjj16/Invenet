<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\InformeAnomalia;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Resources\InformeAnomaliaResource;

class InformeAnomaliaController extends BaseController
{
    public function index(): JsonResponse
    {
        $informes = InformeAnomalia::all();
        return $this->sendResponse(InformeAnomaliaResource::collection($informes), 'Informes de anomalia listados correctamente.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'descripcion' => 'required|string',
            'fecha_informe' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $informe = InformeAnomalia::create($input);

        return $this->sendResponse(new InformeAnomaliaResource($informe), 'Informe de anomalia creado correctamente.');
    }

    public function show($id): JsonResponse
    {
        $informe = InformeAnomalia::find($id);

        if (is_null($informe)) {
            return $this->sendError('Informe no encontrado.');
        }

        return $this->sendResponse(new InformeAnomaliaResource($informe), 'Informe obtenido correctamente.');
    }

    public function update(Request $request, InformeAnomalia $informe_anomalia): JsonResponse
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'descripcion' => 'required|string',
            'fecha_informe' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $informe_anomalia->update($input);

        return $this->sendResponse(new InformeAnomaliaResource($informe_anomalia), 'Informe actualizado correctamente.');
    }

    public function destroy(InformeAnomalia $informe_anomalia): JsonResponse
    {
        $informe_anomalia->delete();

        return $this->sendResponse([], 'Informe eliminado correctamente.');
    }
}
