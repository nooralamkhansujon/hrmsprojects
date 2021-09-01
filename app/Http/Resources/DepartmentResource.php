<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'department_name' => $this->department_name,
            'status'    => $this->status,
            'created_at' => date('m-d-Y',strtotime($this->created_at)),
        ];
    }
}