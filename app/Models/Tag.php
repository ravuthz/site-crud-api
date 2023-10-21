<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    use CrudAuditActions;


    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'taggable');
    }

    public function articles(): MorphToMany
    {
        return $this->morphToMany(Article::class, 'taggable');
    }
}
