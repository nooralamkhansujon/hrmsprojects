<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','employee_name','promotion_date','previous_designation','new_designation','new_degree','previous_promotion_date','previous_basic','new_basic','previous_gross','increment_amount','effect_date','refference_no','approved'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
