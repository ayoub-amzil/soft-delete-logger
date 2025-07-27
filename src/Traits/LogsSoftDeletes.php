<?php

namespace AyoubAmzil\SoftDeleteLogger\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use AyoubAmzil\SoftDeleteLogger\Models\SoftDeleteLog;

trait LogsSoftDeletes
{
    public static function bootLogsSoftDeletes()
    {
        static::deleting(function (Model $model) {
            if (! $model->isForceDeleting()) {
                SoftDeleteLog::create([
                    'model' => get_class($model),
                    'model_id' => $model->getKey(),
                    'user_id' => Auth::id(),
                    'action' => 'soft_deleted',
                ]);
            }
        });

        static::restored(function (Model $model) {
            SoftDeleteLog::create([
                'model' => get_class($model),
                'model_id' => $model->getKey(),
                'user_id' => Auth::id(),
                'action' => 'restored',
            ]);
        });
    }
}
