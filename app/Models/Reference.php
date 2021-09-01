<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','name','organization','relation','address','email','phone_number'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

}
