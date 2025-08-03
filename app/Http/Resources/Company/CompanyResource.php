<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,

            'building' => $this->whenLoaded('building', fn() => [
                'id' => $this->building->id,
                'address' => $this->building->address,
                'coordinates' => [
                    'latitude' => $this->building->latitude,
                    'longitude' => $this->building->longitude
                ]
            ]),

            'phones' => $this->whenLoaded('phones', fn() =>
                $this->phones->map(fn($phone) => $phone->number)
            ),
 
            'activities' => $this->whenLoaded('activities', fn() =>
                $this->activities->map(fn($activity) => [
                    'id' => $activity->id,
                    'name' => $activity->name,
                    'level' => $activity->level
                ])
            )
        ];
    }
}
