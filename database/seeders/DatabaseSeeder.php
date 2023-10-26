<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Genre;
use App\Enums\UserType;
use App\Models\Client;
use App\Models\Developpeur;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $uuid = Str::uuid();
        $devid = Str::uuid();
        User::factory()->create([
            'id' => $uuid,
            'userable_id'=> $devid,
            'userable_type' => UserType::Developpeur->value
        ]);
        
        

        Developpeur::factory()->create([
            'id'=> $devid,
            'user_id'=> $uuid
        ]);
        // $devid = Str::uuid();
        // User::factory()->
        // $user = User::factory()->create([
        //     'userable_type' => UserType::Developpeur->value,
        //     'userable_id' => $devid
        // ]);

        // Developpeur::factory()->create([
        //     'user_id'=> $user->id
        // ]);

    }
}
