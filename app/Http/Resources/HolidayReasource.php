<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidayReasource extends JsonResource
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
            'id'                 => $this->id,
            'holiday_type'       => $this->holidayType->holiday_type,
            'holiday_type_id'    => $this->holidayType->id,
            'date_from'          => $this->date_from,
            'date_to'            => $this->date_to,
            'days'               => $this->days,
            'reason'             => $this->reason,
            'remarks'            => $this->remarks,
            'status'             => $this->status == 1 ? true:false
        ];
    }
}
