<?php

use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Customer::all();
        $trainings = \App\Training::all();

        $customers->each(function (\App\Customer $customer) use ($trainings) {
            if (rand(0, 1)) {
                return;
            }

            $trainings->random(rand(1, 3))->each(function (\App\Training $training) use ($customer) {
                factory(\App\Booking::class)->create([
                    'training_id' => $training->id,
                    'user_id' => $customer->id,
                ]);
            });
        });
    }
}
