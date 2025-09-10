<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ChoiceSeeder::class);
        $this->call(DummyProfileSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LanguageAdminSeeder::class);
        $this->call(LanguageFrontSeeder::class);
    }
}
