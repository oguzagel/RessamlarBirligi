<?php

namespace Database\Seeders;

use App\Models\Category;
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

        $faker = \Faker\Factory::create();

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

         
        DB::table('artists')->insert([
            'name' =>  $faker->name(),
            'content_az' => $faker->text(),
            'content_en' => $faker->text(),
            'image' => 'https://dummyimage.com/400x400/000/fff',
            'status' => 1,
        ]);
        
        DB::table('artists')->insert([
            'name' => $faker->name(),
            'content_az' => $faker->text(),
            'content_en' => $faker->text(),
            'image' => 'https://dummyimage.com/400x400/000/fff',
            'status' => 1,
        ]);
        
        DB::table('artists')->insert([
            'name' => $faker->name(),
            'content_az' => $faker->text(),
            'content_en' => $faker->text(),
            'image' => 'https://dummyimage.com/400x400/000/fff',
            'status' => 1,
        ]);
        
        
        DB::table('artists')->insert([
            'name' => $faker->name(),
            'content_az' => $faker->text(),
            'content_en' => $faker->text(),
            'image' => 'https://dummyimage.com/400x400/000/fff',
            'status' => 1,
        ]);


        DB::table('works')->insert([
            'name_az' =>  $faker->sentence(3),
            'name_en' =>  $faker->sentence(3),
            'path' => 'https://dummyimage.com/600x400/000/fff',
            'status' => 1,
            'artist_id' => 1,
        ]);
         
        DB::table('works')->insert([
            'name_az' =>  $faker->sentence(3),
            'name_en' =>  $faker->sentence(3),
            'path' => 'https://dummyimage.com/600x400/000/fff',
            'status' => 1,
            'artist_id' => 2,
        ]);
         
        DB::table('works')->insert([
            'name_az' =>  $faker->sentence(3),
            'name_en' =>  $faker->sentence(3),
            'path' => 'https://dummyimage.com/600x400/000/fff',
            'status' => 1,
            'artist_id' => 3,
        ]);
         
        DB::table('works')->insert([
            'name_az' =>  $faker->sentence(3),
            'name_en' =>  $faker->sentence(3),
            'path' => 'https://dummyimage.com/600x400/000/fff',
            'status' => 1,
            'artist_id' => 4,
        ]);
         
        DB::table('works')->insert([
            'name_az' =>  $faker->sentence(3),
            'name_en' =>  $faker->sentence(3),
            'path' => 'https://dummyimage.com/600x400/000/fff',
            'status' => 1,
            'artist_id' => 1,
        ]);
         
        
        DB::table('artist_categories')->insert([ 'artist_id'=>1  , 'category_id' =>1   ]);
        DB::table('artist_categories')->insert([ 'artist_id'=>2  , 'category_id' =>1   ]);
        DB::table('artist_categories')->insert([ 'artist_id'=>3  , 'category_id' =>1   ]);
        DB::table('artist_categories')->insert([ 'artist_id'=>4  , 'category_id' =>1   ]);
        DB::table('artist_categories')->insert([ 'artist_id'=>1  , 'category_id' =>2   ]);
    }
}
