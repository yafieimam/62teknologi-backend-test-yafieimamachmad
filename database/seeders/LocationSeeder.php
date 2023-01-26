<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location')->insert([
			[
				'business_id' => 'H4jJ7XB3CetIr1pg56CczQ',
				'address1' => '167 W 74th St',
                'address2' => '',
                'address3' => '',
                'city' => 'New York',
                'zip_code' => '10023',
                'country' => 'US',
                'state' => 'NY',

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'address1' => '205 E Houston St',
                'address2' => '',
                'address3' => '',
                'city' => 'New York',
                'zip_code' => '10002',
                'country' => 'US',
                'state' => 'NY',

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'address1' => '65 4th Ave',
                'address2' => '',
                'address3' => '',
                'city' => 'New York',
                'zip_code' => '10003',
                'country' => 'US',
                'state' => 'NY',

			]
		]);
    }
}
