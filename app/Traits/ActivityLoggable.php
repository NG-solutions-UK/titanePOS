<?php

namespace App\Traits;

use App\Models\ActivityLog;

trait ActivityLoggable
{
    public static function bootActivityLoggable()
    {
        static::created(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'created',
                'table_name' => $model->getTable(),
                'record_id' => $model->id,
                'new_values' => $model->toArray(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

        });

        static::updating(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'updated',
                'table_name' => $model->getTable(),
                'record_id' => $model->id,
                'old_values' => $model->getOriginal(),
                'new_values' => $model->getDirty(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

        });

        static::deleted(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'action' => 'deleted',
                'table_name' => $model->getTable(),
                'record_id' => $model->id,
                'old_values' => $model->toArray(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

        });
    }
}