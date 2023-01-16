<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the contacts that belongs to a group
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, ContactGroup::class)->withTimestamps();
    }

    /**
     * Get the user that owns the Group
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the messages for the group.
     */
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class, GroupMessage::class)->withTimestamps();
    }
}
