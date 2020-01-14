<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Shomisha\UnusualRelationships\HasUnusualRelationships;

class Trainer extends User
{
    use HasUnusualRelationships;

    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('loadTrainers', function (Builder $query) {
            $query->trainer();
        });

        self::saving(function (Trainer $trainer) {
            $trainer->type = self::TYPE_TRAINER;
        });
    }

    public function bookings()
    {
        return $this->belongsToManyThrough(Booking::class, Training::class);
    }
}
