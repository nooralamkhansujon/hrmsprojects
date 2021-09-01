<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        // dd($this->all());
        if(isset($this->id) && !empty($this->id)){
            return [
                'employee_id'             => 'required',
                'employee_name'           => 'required' ,
                'department_id'     => 'required' ,
                'employee_type'           => 'required',
                'designation'             => 'required',
                'basic_salary'            => 'required|numeric' ,
                'gross_salary'            => 'required|numeric',
                'tin'                     => 'required' ,
                'mobile_number'           => 'required|regex:/^([0-9]*)$/|digits:11',
                'emergency_mobile_number' => 'required|regex:/^([0-9]*)$/|digits:11' ,
                'email'                   => 'required|email',
                'joining_date'            => 'required' ,
                'father_name'             => 'required|string',
                'mother_name'             => 'required|string' ,
                'nid_number'              => 'required',
                'religion'                => 'required' ,
                'blood_group'             => 'required',
                'gender'                  => 'required',
                'bank_name'               => 'required',
                'bank_account_number'     => 'required',
                'weekly_off_day'          => 'required',
                'permanent_address'       => 'required',
                'present_address'         => 'required',

            ];
        }
        return [
            'employee_name'           => 'required' ,
            'employee_department'     => 'required' ,
            'employee_designation'    => 'required',
            'employee_type'           => 'required',
            'basic_salary'            => 'required|numeric' ,
            'gross_salary'            => 'required|numeric',
            'tin'                     => 'required' ,
            "employee_image"          => 'required|image|mimes:jpg,jpeg,png',
            'mobile_number'           => 'required|regex:/^([0-9]*)$/|digits:11',
            'emergency_mobile_number' => 'required|regex:/^([0-9]*)$/|digits:11' ,
            'email'                   => 'required|email',
            'joining_date'            => 'required' ,
            'father_name'             => 'required|string',
            'mother_name'             => 'required|string' ,
            'nid'                     => 'required',
            'religion'                => 'required' ,
            'blood_group'             => 'required',
            'gender'                  => 'required',
            'bank_name'               => 'required',
            'bank_account_number'     => 'required',
            'weekly_off_day'          => 'required',
            'permanent_address'       => 'required',
            'present_address'         => 'required',
            "education__eduction_level" => 'required',
            "education__major_group"    => 'required',
            "education__institute"      => 'required',
            "education__country"        => 'required',
            "education__result_type"    => 'required',
            "education__result"         => 'required',
            "education__passing_year"   => 'required',
            "education__duration"       => 'required',
            "education__achievement"    => 'required',
            "training__training_title"  => 'required',
            "training__topics_covered"  => 'required',
            "training__institute"       => 'required',
            "training__training_type"   => 'required',
            "training__country"         => "required",
            "training__location"        => 'required',
            "training__training_year"   => 'required',
            "training__duration"        => 'required',
            "relative__name"            => 'required',
            "relative__relation_type"   => 'required',
            "relative__occupation"      => 'required',
            "relative__gender"          => 'required',
            "relative__address"         => "required",
            "relative__contact_number"  => 'required|required|regex:/^([0-9]*)$/|digits:11',
            "reference__name"           => "required",
            "reference__organization"   => 'required',
            "reference__relation"       => 'required',
            "reference__address"        => 'required',
            "reference__email"          => 'required|email',
            "reference__phone_number"   => 'required|required|regex:/^([0-9]*)$/|digits:11'
        ];
    }
}
