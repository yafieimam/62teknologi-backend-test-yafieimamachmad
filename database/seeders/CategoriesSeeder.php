<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
			[
				'alias' => 'bakeries',
				'title' => 'Bakeries'

			],
			[
				'alias' => 'delis',
				'title' => 'Delis'

			],
            [
				'alias' => 'sandwiches',
				'title' => 'Sandwiches'

			],
            [
				'alias' => 'soup',
				'title' => 'Soup'

			],
            [
				'alias' => 'ramen',
				'title' => 'Ramen'

			]
		]);
    }
}
