<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingInvite extends Model
{
    use HasFactory;
    protected $fillable = ['training_program_id','description','date_from','date_to'];

    public function employees(){
        return $this->belongsToMany(Employee::class,'employee_training_invite','training_invite_id','employee_id','id','id');
    }
    public function trainingProgram(){
        return $this->belongsTo(TrainingProgram::class,'training_program_id','id');
    }
}
