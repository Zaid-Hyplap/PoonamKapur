<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'review',
        'rating',
        'product_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'UID', 'productUId');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }

    public function package()
    {
        return $this->hasOne(Package::class, 'UID', 'packageUId');
    }


}
