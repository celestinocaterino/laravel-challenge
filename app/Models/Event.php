<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Attendee;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(Attendee::class, 'event_attendee', 'event_id', 'attendee_id');
    }
}
