<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveTypeRequest extends FormRequest
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
        if($this->has('id') && $this->id){
            return [
                'leave_type'   => "required|unique:leave_types,leave_type,".$this->id,
                'description'  => 'required'
            ];
        }
        else{
            return [
                'leave_type'   => "required|unique:leave_types,leave_type",
                'description'  => 'required'
            ];
        }
    }
}
