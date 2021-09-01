<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = ['leave_type_id','employee_id','date_from','date_to','days','reason','status','remarks'];

    //get LeaveType Single data of Leave
    public function leave_type(){
        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }//end property method

    //get Leave Employee
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }//end property method
}
