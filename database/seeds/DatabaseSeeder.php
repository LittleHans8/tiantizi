<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_DEBUG')) {
            $this->call(UsersTableSeeder::class);
            $this->call(NodeTablesSeeder::class);
            $this->call(GiftCodesSeeder::class);
        }
        $this->call(RolesTableSeeder::class);

    }

}
