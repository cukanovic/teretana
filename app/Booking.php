<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_COMPLETED = 'completed';
}
