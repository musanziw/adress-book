<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the Contact
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get groups to which belogs the Contact
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, ContactGroup::class)->withTimestamps();
    }

    /**
     * Get the messages for the contact.
     */
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class, ContactMessage::class)->withTimestamps();
    }
}
