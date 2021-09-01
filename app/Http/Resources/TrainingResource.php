<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            'training_title'        => $this->training_title,
            'topics_covered'        => $this->topics_covered,
            'institute'             => $this->institute,
            'training_type'         => $this->training_type,
            'country'               => $this->country,
            'location'              => $this->location,
            'training_year'         => $this->training_year,
            'duration'              => $this->duration,
            'employee_image'        => asset("images/employees/{$this->employee->employee_image}"),
        ];
    }
}
