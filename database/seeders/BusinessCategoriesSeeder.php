<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_categories')->insert([
			[
				'business_id' => 'H4jJ7XB3CetIr1pg56CczQ',
				'categories_id' => 1

			],
			[
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'categories_id' => 2

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'categories_id' => 3

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'categories_id' => 4

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'categories_id' => 5

			]
		]);
    }
}
