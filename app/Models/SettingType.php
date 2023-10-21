<?php

namespace App\Models;

use App\Crud\CrudAuditActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingType extends Model
{
    use HasFactory;
    use CrudAuditActions;

    protected $guarded = ['id'];

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }
}
