<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'Tiaan Theunissen',
            'is_admin' => true,
            'email' => 'tiaant@saiba.org.za',
            'password' => bcrypt('password')]);
    }
}
