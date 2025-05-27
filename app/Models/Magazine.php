<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    protected $fillable = [
    'title',
    'description',
    'price',
    'release_date',
    'cover',
    'featured',
    'category_id',
];
protected $casts = [
    'release_date' => 'date',
];

public function category()
{
    return $this->belongsTo(Category::class);
}

}
