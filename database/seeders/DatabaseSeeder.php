<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call( RoleSeeder::class);
        $this->call( ThemeSeeder::class);
        $this->call( LanguageSeeder::class);
        $this->call( SnippetSeeder::class);

        $this->call( UserSeeder::class);
        $this->call( DirectorySeeder::class);
        $this->call( TutorialSeeder::class);
    }
}
