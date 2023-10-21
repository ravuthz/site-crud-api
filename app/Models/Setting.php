<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    use CrudAuditActions;

    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(SettingType::class);
    }
}
