<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayTypeRequest extends FormRequest
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
                'holiday_type'   => "required|unique:holiday_types,holiday_type,".$this->id,
                'description'  => 'required'
            ];
        }
        else{
            return [
                'holiday_type'   => "required|unique:holiday_types,holiday_type",
                'description'  => 'required'
            ];
        }
    }
}
