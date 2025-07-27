<?php

namespace AyoubAmzil\SoftDeleteLogger\Models;

use Illuminate\Database\Eloquent\Model;

class SoftDeleteLog extends Model
{
    protected $fillable = [
        'model',
        'model_id',
        'user_id',
        'action',
    ];
}
