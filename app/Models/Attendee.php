<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Event;

class Attendee extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_attendee', 'attendee_id', 'event_id');
    }
}
