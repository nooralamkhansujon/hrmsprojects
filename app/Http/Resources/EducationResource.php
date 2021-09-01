<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'id'                   => $this->id,
            'employee_id'          => $this->employee->id,
            'employee_ref_id'       => $this->employee->employee_id,
            'employee_name'        => $this->employee->employee_name,
            'education_level'      => $this->education_level,
            'major_group'          => $this->major_group,
            'institute'            => $this->institute,
            'country'              => $this->country,
            'result_type'          => $this->result_type,
            'result'               => $this->result,
            'passing_year'         => $this->passing_year,
            'duration'             => $this->duration,
            'achievement'          => $this->achievement,
            'employee_image'       => asset("images/employees/{$this->employee->employee_image}"),
        ];
    }
}
