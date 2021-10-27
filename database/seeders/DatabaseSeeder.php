<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('categories')->insert([ 'name' =>  'Painting']);
        DB::table('categories')->insert([ 'name' =>  'Sculpture']);
        DB::table('categories')->insert([ 'name' =>  'Decorative Applied Art']);
        DB::table('categories')->insert([ 'name' =>  'Theater, Cinema and TV']);
        DB::table('categories')->insert([ 'name' =>  'Study of Art']);
        DB::table('categories')->insert([ 'name' =>  'Old Masters']);
        DB::table('categories')->insert([ 'name' =>  'Graphics']);


        DB::table('users')->insert([
            'name' => 'Oğuz Demir',
            'email' => 'oguz@pikselist.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
            'is_admin' => true
        ]);

        /* 
        DB::table('artists')->insert([
            'name' => $this->faker->name(),
            'content_az' => $this->faker->text(),
            'content_en' => $this->faker->text(),
            'category_id' => 1,
            'status' => 1,
        ]);
        
        DB::table('artists')->insert([
            'name' => $this->faker->name(),
            'content_az' => $this->faker->text(),
            'content_en' => $this->faker->text(),
            'category_id' => 2,
            'status' => 1,
        ]);
        
        DB::table('artists')->insert([
            'name' => $this->faker->name(),
            'content_az' => $this->faker->text(),
            'content_en' => $this->faker->text(),
            'category_id' => 3,
            'status' => 1,
        ]);
        
        
        DB::table('artists')->insert([
            'name' => $this->faker->name(),
            'content_az' => $this->faker->text(),
            'content_en' => $this->faker->text(),
            'category_id' => 4,
            'status' => 1,
        ]);

         */


    }
}
