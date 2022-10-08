<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productreceipe extends Model
{
    use HasFactory;


    public function rawmaterial()
    {
        return $this->hasOne(Rawmaterial::class,'UID','rawMaterialUId');
    }


}
