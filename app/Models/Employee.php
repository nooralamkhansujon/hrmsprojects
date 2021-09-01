<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;
    protected $fillable = ['employee_id','employee_name','employee_type','employee_status','employee_department','designation','basic_salary','gross_salary','tin','employee_image','mobile_number','emergency_mobile_number','email','joining_date','father_name','mother_name','nid_number','religion','blood_group','gender','bank_name','bank_account_number','weekly_off_day','permanent_address','present_address'];



    public function experiences(){
        return $this->hasMany(Experience::class,'employee_id','id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'employee_department','id');
    }



}
