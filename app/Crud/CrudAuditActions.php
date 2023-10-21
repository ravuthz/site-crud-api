<?php

namespace App\Crud;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

trait CrudAuditActions
{
    public function audits()
    {
        return $this->morphMany(Audit::class, 'auditable');
    }

    public function logAudit($action = ''): void
    {
        $oldValues = $this->getOriginal();
        $newValues = $this->getAttributes();

        $audit = new Audit([
            'user_id' => Auth::id(),
            'action' => $action,
            'old_values' => json_encode($oldValues),
            'new_values' => json_encode($newValues),
            'extra_info' => json_encode([
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'request_method' => request()->method(),
                'request_action' => $action,
            ]),
        ]);

        $this->audits()->save($audit);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($model) {
            $model->logAudit('create');
        });

        static::updated(function ($model) {
            $model->logAudit('update');
        });

        static::deleted(function ($model) {
            $model->logAudit('delete');
        });

        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->id();
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->id();
            }
        });

        static::deleting(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->id();
            }
        });
    }
}
