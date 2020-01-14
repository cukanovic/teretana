<?php

use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainers = \App\Trainer::all();

        $trainers->each(function (\App\Trainer $trainer) {
            $numberOfTrainings = rand(0, 3);
            if ($numberOfTrainings) {
                factory(\App\Training::class, $numberOfTrainings)->create([
                    'trainer_id' => $trainer->id,
                ]);
            }
        });
    }
}
