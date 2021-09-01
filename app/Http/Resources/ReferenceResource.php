<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReferenceResource extends JsonResource
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
            'id'                    => $this->id,
            'employee_id'           => $this->employee->id,
            'promotion_date'        => $this->employee->promotion_date,
            'previous_designation'  => $this->previous_designation,
            'new_designation'       => $this->new_designation,
            'new_degree'            => $this->new_degree,
            'previous_promotion_date'         => $this->previous_promotion_date,
            'previous_basic'        => $this->previous_basic,
            'new_basic'             => $this->new_basic,
            'previous_gross'        => $this->previous_gross,
            'increment_amount'      => $this->increment_amount,
            'effect_date'           => $this->effect_date,
            'refference_no'         => $this->refference_no,
            'approved'              => $this->approved,
            'employee_image'        => asset("images/employees/{$this->employee->employee_image}"),
        ];
    }
}
