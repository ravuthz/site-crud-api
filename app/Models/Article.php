<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use CrudAuditActions;

    protected $guarded = ['id'];

    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'type_id' => 'integer',
        'options' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Setting::class);
    }

    public function scopeWhereHasType($query, $type)
    {
        return $query->whereHas('type', fn ($q) => $q->where('name', $type));
    }
}
