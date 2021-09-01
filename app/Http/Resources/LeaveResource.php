<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
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
            'id'               => $this->id,
            'leave_type'       => $this->leave_type->leave_type,
            'leave_type_id'    => $this->leave_type->id,
            'employee_name'    => $this->employee->employee_name,
            'employee_id'      => $this->employee->id,
            'employee_image'   => asset("images/employees/{$this->employee->employee_image}"),
            'date_from'        => $this->date_from,
            'date_to'          => $this->date_to,
            'days'             => $this->days,
            'reason'           => $this->reason,
            'remarks'          => $this->remarks,
            'status'           => $this->status == 1 ? true:false
        ];
    }
}
