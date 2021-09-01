<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;
    protected $fillable = ['name','employee_id','relation_type','occupation','gender','address','contact_number'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
