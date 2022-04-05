<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('mains')->insert([
            'image' => 'images/logo.png',
            'title' => 'Click',
            'seo_title' => 'Заголовок страницы',
            'description' => 'Just another Responsive Site by <a href="http://themewagon.com">Themewagon</a>',
            'seo_description' => 'Художественный проект',
            'footer' => '<ul class="copyright text-center"><li>© Click</li><li>Design: <a href="http:themewagon.com">Themewagon</a></li></ul>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pictures')->insert([
            'image' => '/images/fulls/02.jpg',
            'anons' => 'Lorem ipsum dolor sit amet, consectetur adipiscing...',
            'name' => 'Carp , Nature , Slippers',
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('icons')->insert([
            'image' => 'fa-facebook',
            'title' => 'Facebook',
            'active' => 1,
            'link' => 'https://facebook.com'
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'is_admin' => 1,
            'password' => Hash::make('adminadmin'),
        ]);
    }
}
