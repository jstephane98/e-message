<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    protected $fillable = [
        'mediable',
        'disk',
        'path',
        'filename',
        'mimetype',
        'extension',
    ];

    public function user(): MorphTo
    {
        return $this->morphTo(User::class, 'mediable');
    }

    public function message(): MorphTo
    {
        return $this->morphTo(Message::class, 'mediable');
    }

    public function group(): MorphTo
    {
        return $this->morphTo(Group::class, 'mediable');
    }
}
