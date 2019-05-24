<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ClientResource extends JsonResource
{
    /*public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        $headers = ['Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'];
        $options = JSON_UNESCAPED_UNICODE;
        $this->encodingOptions = $options;

        parent::__construct($data, $status, $headers);
    }*/
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => (string)$this->id,
            'name'          => (string)$this->name,
            'phone'          => (string)$this->phone  
        ];
        //return parent::toArray($request);
    }
}
