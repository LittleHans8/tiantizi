<?php

use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 50)->create();
        $free = Role::where('name', 'free')->get()->first();
        foreach ($users as $user) {
            $user->attachRole($free);
        }
    }
}
