<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = ['education_level','major_group','institute','country','result_type','result','passing_year','duration','achievement','employee_id'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
