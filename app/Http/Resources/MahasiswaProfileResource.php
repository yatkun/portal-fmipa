<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaProfileResource extends JsonResource
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
            'user_id' => $this->user_id,
            'nim' => $this->nim,
            'nama_mahasiswa' => $this->nama_mahasiswa,
            'semester' => $this->semester,
            'foto_profil' => $this->foto_profil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
