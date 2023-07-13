<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\User;
use App\Models\Category;
use App\Models\Director;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Director::factory(5)->create();
        Film::factory(20)->create();
        User::create([
            'name' => 'amstrong',
            'username' => 'amstrong nugraha',
            'email' => 'amstrong@gmail.com',
            'password' => bcrypt('password123')
        ]);
        User::factory(2)->create();

        // Category::factory(3)->create();

        // Director::create([
        //     'name' => "Amstrong"
        // ]);
        // Director::create([
        //     'name' => "Nugraha"
        // ]);
        // Film::create([
        //     'title' => "Film-1",
        //     'slug' => "film-1",
        //     'sinopsis' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio accusantium repellat deleniti perspiciatis totam neque.",
        //     'full_sinopsis' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nemo quas adipisci quaerat saepe a praesentium excepturi explicabo, sapiente ipsam perferendis odio sit culpa quidem, hic repellat accusantium eligendi. Tenetur, consequuntur laborum nisi expedita facilis deserunt voluptate dolores voluptatem aliquam, optio vel iste repellendus repudiandae ullam nulla aspernatur ad modi repellat voluptatum distinctio, labore sit impedit? Distinctio, consectetur esse? Natus minus ullam ratione nesciunt quae aut totam quod quidem reiciendis ad. Totam facere aut consequuntur accusantium nam? Eligendi dolor, exercitationem quis distinctio ducimus, cupiditate voluptatem nulla, officiis quasi nisi a. Provident quas quibusdam et enim beatae at adipisci neque rem?",
        //     'category_id' => 1,
        //     'director_id' => 1
        // ]);
        Category::create([
            'name' => "Horror",
            'slug' => "Horror"
        ]);
        Category::create([
            'name' => "Comedy",
            'slug' => "Comedy"
        ]);
        Category::create([
            'name' => "Romantic",
            'slug' => "Romantic"
        ]);
    }
}
