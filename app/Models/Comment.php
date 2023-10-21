<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Comment extends Model
{
    use HasFactory;
    use CrudAuditActions;


    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'id' => 'integer',
        'article_id' => 'integer',
        'parent_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'commentable');
    }

    public function articles(): MorphToMany
    {
        return $this->morphToMany(Article::class, 'commentable');
    }
}
