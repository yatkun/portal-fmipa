<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DosenProfileResource extends JsonResource
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
            'nama_dosen' => $this->nama_dosen,
            'nomor_induk_pegawai' => $this->nomor_induk_pegawai,
            'keahlian' => $this->keahlian,
            'email_institusional' => $this->email_institusional,
            'foto_profil' => $this->foto_profil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
