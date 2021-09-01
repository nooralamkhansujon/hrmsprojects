<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayType extends Model
{
    use HasFactory;
    protected $fillable = ['holiday_type','description','status'];

   public function holidays(){
       return $this->hasMany(Holiday::class,'holiday_type_id','id');
   }
}
