<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    protected $guarded = [];

    /**
     * Get the user that owns the Message
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the contacts for the message.
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'contact_messages')
            ->withTimestamps();
    }

    /**
     * Get the groups for the message.
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_messages')
            ->withTimestamps();
    }
}
