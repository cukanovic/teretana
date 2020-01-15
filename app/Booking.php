<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $casts = [
        'schedule' => 'datetime',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_COMPLETED = 'completed';

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    public function scopePending($query)
    {
        $query->where('bookings.status', self::STATUS_PENDING);
    }

    public function scopeAccepted($query)
    {
        $query->where('bookings.status', self::STATUS_ACCEPTED);
    }

    public function scopeCompleted($query)
    {
        $query->where('bookings.status', self::STATUS_COMPLETED);
    }

    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isAccepted()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }
}
