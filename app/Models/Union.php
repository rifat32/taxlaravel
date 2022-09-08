<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Union extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "unions";
    protected $fillable = [
        "name",
        "image"
    ];
    public function chairman()
    {
        return $this->hasOne(Chairman::class, 'union_id', 'id')->withTrashed();
    }
}
