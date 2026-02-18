<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JawabanResource extends JsonResource
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
            'tugas_id' => $this->tugas_id,
            'user_id' => $this->user_id,
            'jawaban' => $this->jawaban,
            'file_jawaban' => $this->file_jawaban,
            'nilai' => $this->nilai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
