<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class EmployeeResource extends JsonResource
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
            'employee_id'          => $this->employee_id,
            'employee_name'        =>$this->employee_name,
            'employee_type'        =>$this->employee_type,
            'employee_status'      =>$this->employee_status,
            'employee_department'  =>$this->department?->department_name,
            'department_id'        => $this->department?->id,
            'designation'          =>$this->designation,
            'basic_salary'         =>$this->basic_salary,
            'gross_salary'         =>$this->gross_salary,
            'tin'                  =>$this->tin,
            'employee_image'           =>asset("images/employees/{$this->employee_image}"),
            'mobile_number'            =>$this->mobile_number,
            'emergency_mobile_number'  =>$this->emergency_mobile_number,
            'email'                    =>$this->email,
            'joining_date'             =>$this->joining_date,
            'father_name'              =>$this->father_name,
            'mother_name'              =>$this->mother_name,
            'nid_number'               =>$this->nid_number,
            'religion'                 =>$this->religion,
            'blood_group'              =>$this->blood_group,
            'gender'                   =>$this->gender,
            'bank_name'                =>$this->bank_name,
            'bank_account_number'      =>$this->bank_account_number,
            'weekly_off_day'           =>$this->weekly_off_day,
            'permanent_address'        =>$this->permanent_address,
            'present_address'          => $this->present_address,
            'created_at'               => $this->created_at->format('M d Y'),
            // 'experiences'              => ExperienceResource::collection($this->experiences)
        ];
    }
}
