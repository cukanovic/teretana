<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'number_of_sessions', 'trainer_id'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function getNameAttribute()
    {
        return ucwords($this->attributes['name'] ?? '');
    }

    public function canBeDeleted()
    {
        return $this->bookings()->count() == 0;
    }
}
