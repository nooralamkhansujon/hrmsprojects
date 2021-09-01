<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','employee_id','department','position_held','responsibility','experience_area','from_date','to_date','company_address'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
