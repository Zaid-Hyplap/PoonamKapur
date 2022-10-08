<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
    ];

    public function macro()
    {
        return $this->hasOne(Productmacro::class, 'productUId', 'UID');
    }

    public function recipe()
    {
        return $this->hasMany(Productreceipe::class,'productUId','UID');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categoryId');
    }

    // subcategory
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subCategoryId');
    }

    // mealtype
    public function mealtype()
    {
        return $this->hasOne(Mealtype::class, 'id', 'mealTypeId');
    }

    // mealTime
    public function mealtime()
    {
        return $this->hasMany(Mealtime::class, 'id', 'mealTime');
    }


}
