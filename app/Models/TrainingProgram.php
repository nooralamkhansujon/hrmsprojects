<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;
    protected $fillable = ['training_program','description','status'];

    public function trainingInvites(){
        return $this->hasMany(TrainingInvite::class,'training_program_id','id');
    }
}
