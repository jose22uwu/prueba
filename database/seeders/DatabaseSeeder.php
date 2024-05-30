<?php

namespace Database\Seeders;

use App\Http\Controllers\taskController;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\taskFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Task::factory(4)->create(); //aqui se manda a hacer los datos dummy para que siempre se vean cuando se haga el comando

         //se mandan a hacer llamando al modelo :: factory + numero de registros dummy y el crear
       
     
    }
}
