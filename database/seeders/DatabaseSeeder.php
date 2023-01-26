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
        $this->call(
			[
                BusinessCategoriesSeeder::class,
                BusinessSeeder::class,
                BusinessTransactionTypeSeeder::class,
                CategoriesSeeder::class,
                CoordinatesSeeder::class,
                DatabaseSeeder::class,
                LocationSeeder::class,
                TransactionTypeSeeder::class
            ]
		);
    }
}
