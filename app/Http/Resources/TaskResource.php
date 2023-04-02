<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'tasks',
            'id' => $this->id,
            "attributes" => [
                'description' => $this->description,
                'age' => Carbon::parse($this->created_at)->diffForHumans(),
                'status' => $this->status,
                'priority' => $this->priority,
            ],

        ];
    }
}
