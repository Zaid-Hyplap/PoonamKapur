<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'duration',
        'status',
    ];

    public function goal()
    {
        return $this->hasOne(Goal::class, 'id' , 'goalId');
    }

    public function mealtype()
    {
        return $this->hasOne(Mealtype::class, 'id' , 'mealTypeId');
    }
}
