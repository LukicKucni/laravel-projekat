<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function magazines()
    {
        return $this->hasMany(Magazine::class);
    }
    protected $fillable = ['name'];

}
