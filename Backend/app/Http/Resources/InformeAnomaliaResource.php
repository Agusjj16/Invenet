<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformeAnomaliaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'descripcion' => $this->descripcion,
            'fecha_informe' => $this->fecha_informe,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
