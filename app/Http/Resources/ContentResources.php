<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResources extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idcont' => $this->idcont,
            'title' => $this->title,
            'summary' => $this->summary,
            'description' => $this->description,
            'date_redaction' => $this->date_redaction
        ];
    }
}
