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

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Training::class)
            ->whereIn('status', [Booking::STATUS_ACCEPTED, Booking::STATUS_COMPLETED]);
    }

    public function getDescriptionAttribute()
    {
        return 'Body Building, the original LES MILLS barbell class, will sculpt, tone and strengthen your entire body, fast!';
    }
}
