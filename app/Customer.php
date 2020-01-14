<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class Customer extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('loadCustomers', function (Builder $query) {
            $query->customer();
        });

        self::saving(function (Customer $customer) {
            $customer->type = self::TYPE_USER;
        });
    }
}
