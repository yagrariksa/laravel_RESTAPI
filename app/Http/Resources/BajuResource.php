<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BajuResource extends JsonResource
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
            'name'  => $this->name,
            'price' => $this->price,
            'pict'  => $this->pict,
        ];
        if (strpos($request->getRequestUri(), 'public') !== false) {
            $data['url'] = [
                'details'   => [
                    'type'  => 'GET',
                    'url'   => route('public.baju.details', $this->id),
                ],
                'update'   => [
                    'type'  => 'POST',
                    'url'   => route('public.baju.update', $this->id),
                ],
                'delete'   => [
                    'type'  => 'DELETE',
                    'url'   => route('public.baju.delete', $this->id),
                ],
            ];
        } else {
            $data['url'] = [
                'details'   => [
                    'type'  => 'GET',
                    'url'   => route('private.baju.details', $this->id),
                ],
                'update'   => [
                    'type'  => 'POST',
                    'url'   => route('private.baju.update', $this->id),
                ],
                'delete'   => [
                    'type'  => 'DELETE',
                    'url'   => route('private.baju.delete', $this->id),
                ],
            ];
        }
        return $data;
    }
}
