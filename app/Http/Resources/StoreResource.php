<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'lat' => $this->lat,
            'long' => $this->long,
            'name_store' => $this->name_store,
            'detail' => route('store.find.one', $this->id),
            'visitor_count' => sizeof($this->visitor),
            // 'visitor' => HistoryResource::collection($this->visitor)
        ];
        return $data;
    }
}
