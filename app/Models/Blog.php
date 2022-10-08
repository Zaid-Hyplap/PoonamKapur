<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'coverImage',
        'tags',
        'creator',
        'writer',
        'description1',
        'description2',
        'status',
        'deleteId'];
}
