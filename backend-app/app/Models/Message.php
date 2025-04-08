<?php

namespace App\Models;

use App\Enums\MessageType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Message extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'send',
        'receive',
        'message',
        'type',
        'group_id',
        'transfert',
        'send_at',
        'receive_at',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'type' => MessageType::class
        ];
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'send');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receive');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
