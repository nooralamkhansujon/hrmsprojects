<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
            'employee_name'           => $this->employee->employee_name,
            'employee_ref_id'       => $this->employee->employee_id,
            'company_name'            => $this->company_name,
            'department'            => $this->department,
            'position_held'         => $this->position_held,
            'responsibility'        => $this->responsibility,
            'experience_area'       => $this->experience_area,
            'from_date'             => $this->from_date,
            'to_date'               => $this->to_date,
            'company_address'       => $this->company_address,
            'employee_image'        => asset("images/employees/{$this->employee->employee_image}"),
        ];;
    }
}
