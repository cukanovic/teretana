<?php

namespace App\Console\Commands;

use App\Admin;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;

class CreateInitialAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin
                                {--name=Admin}
                                {--email=admin@test.com}
                                {--password=123}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an initial administrator account.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            Admin::create([
                'name' => $this->option('name'),
                'email' => $this->option('email'),
                'password' => $this->option('password'),
            ]);
        } catch (QueryException $exception) {
            return $this->error("An administrator account has not been created. This could be due to a duplicate email.");
        }

        $this->info('Administrator account created');
    }
}
