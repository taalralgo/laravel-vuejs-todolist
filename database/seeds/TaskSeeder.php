<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        Task::create([
            'name' => 'Apprendre Laravel'
        ]);

        Task::create([
            'name' => 'Apprendre vue Js'
        ]);

        Task::create([
            'name' => 'Apprendre laravue'
        ]);

        Task::create([
            'name' => 'Utiliser laravue pour un test'
        ]);

        Task::create([
            'name' => 'Utiliser laravue dans le projet Zoumba Cafe'
        ]);

        Task::create([
            'name' => 'Utiliser laravue dans un projet professionnel'
        ]);

        Task::create([
            'name' => 'Utiliser laravue dans un projet payant'
        ]);
    }
}
