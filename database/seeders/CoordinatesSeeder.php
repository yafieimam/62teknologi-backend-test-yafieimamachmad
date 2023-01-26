<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coordinates')->insert([
			[
				'business_id' => 'H4jJ7XB3CetIr1pg56CczQ',
				'latitude' => 40.779961,
                'longitude' => -73.980299

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'latitude' => 40.722237,
                'longitude' => -73.9875259

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'latitude' => 40.73092,
                'longitude' => -73.99015

			]
		]);
    }
}
