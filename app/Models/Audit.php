<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'old_values', 'new_values', 'extra_info'];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'extra_info' => 'array',
    ];

    public function getOld() {
        return json_decode($this->old_values, TRUE);
    }

    public function getNew() {
        return json_decode($this->new_values, TRUE);
    }

    public function getInfo() {
        return json_decode($this->extra_info, TRUE);
    }
}
