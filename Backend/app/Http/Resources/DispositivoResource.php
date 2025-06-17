<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispositivoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'estado' => $this->estado,
            'marca' => $this->marca,
            'fecha_ingreso' => $this->fecha_ingreso,
            'componentes' => $this->componentes,
            'num_serie' => $this->num_serie,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}