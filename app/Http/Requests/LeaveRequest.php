<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'leave_type_id'           => 'required',
            'employee_id'             => 'required' ,
            'date_from'               => 'required|date_format:Y-m-d' ,
            'date_to'                 => 'required|date_format:Y-m-d',
            'days'                    => 'required|integer',
            'reason'                  => 'required|string' ,
            'remarks'                 => 'required|string' ,
        ];
    }
}
