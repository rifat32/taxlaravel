<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        "strong_house_tax",
        "half_strong_house_tax",
        "weak_house_tax",

        "strong_house_yearly_tax",
        "half_strong_yearly_tax",
        "weak_house_yearly_tax",
        "union_id"
     ];

     public function union()
     {
         return $this->hasOne(Union::class, 'id', 'union_id')->withTrashed();
     }
}
