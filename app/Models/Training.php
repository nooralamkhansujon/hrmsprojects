<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['training_title','topics_covered','institute','training_type','country','location','training_year','duration','employee_id'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
