<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $data['pict'] = $data['pict'] ? $data['pict'] : url('assets/image/nothing.png');
        /*
        if (strpos($request->getRequestUri(), 'public') !== false) {
            $data['url'] = [
                'details'   => [
                    'type'  => 'GET',
                    'url'   => route('public.produk.details', $this->id),
                ],
                'update'   => [
                    'type'  => 'POST',
                    'url'   => route('public.produk.update', $this->id),
                ],
                'delete'   => [
                    'type'  => 'DELETE',
                    'url'   => route('public.produk.delete', $this->id),
                ],
            ];
        } else {
            $data['url'] = [
                'details'   => [
                    'type'  => 'GET',
                    'url'   => route('private.produk.details', $this->id),
                ],
                'update'   => [
                    'type'  => 'POST',
                    'url'   => route('private.produk.update', $this->id),
                ],
                'delete'   => [
                    'type'  => 'DELETE',
                    'url'   => route('private.produk.delete', $this->id),
                ],
            ];
        }
        */
        return $data;
    }
}
