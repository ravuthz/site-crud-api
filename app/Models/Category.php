<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use CrudAuditActions;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'options' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
