<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = ['holiday_type_id','date_from','date_to','days','remarks','reason','status'];

    public function holidayType(){
        return $this->belongsTo(HolidayType::class,'holiday_type_id','id');
    }
}
