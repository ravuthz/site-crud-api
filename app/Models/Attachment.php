<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'attachmentable');
    }

    public function articles()
    {
        return $this->morphToMany(Article::class, 'attachmentable');
    }
}
