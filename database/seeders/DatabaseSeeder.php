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

        // $user = new User();
        // $user->nom = 'John';
        // $user->prenom = 'Doe';
        // $user->email = 'john@example.com';
        // $user->password = Hash::make('password');
        // $user->type = UserType::Client->value;
        // $user->telephone = '+2246255514';
        // $user->addresse = 'cite';
        // $user->genre = Genre::Homme->value;
        // $user->nationalite = 'guinne';
        // $user->date = '04-04-2004';
        // $user->img_url = 'https://lol.png';
        // $user->save();

        // $client = new Client();
        // $user->userable()->save($client);
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
