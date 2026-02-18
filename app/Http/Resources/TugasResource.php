<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TugasResource extends JsonResource
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
            'kelas_id' => $this->kelas_id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_akhir' => $this->tgl_akhir,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
