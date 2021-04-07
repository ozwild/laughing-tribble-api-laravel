<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'root',
            'email' => 'aozikuma@gmail.com',
            'password' => \Hash::make('hWLgC6bN')
        ]);
        $user->save();
    }
}
