<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name'
    ] ;

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id'); // Thiết lập quan hệ một-nhiều tới chính model Category
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id'); // Thiết lập quan hệ một-nhiều ngược lại tới chính model Category
    }
}
