<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope('loadAdmins', function (Builder $query) {
            $query->admin();
        });

        self::saving(function (Admin $admin) {
            $admin->type = self::TYPE_ADMIN;
        });
    }
}
