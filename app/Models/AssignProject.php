<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignProject extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','issuing_authority','date_of_assignment','date_of_release'];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function employees(){
        return $this->belongsToMany(Employee::class,'assign_project_employee','assign_project_id','employee_id','id','id');
    }
}
