<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessTransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_transaction_type')->insert([
			[
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'transaction_type_id' => 1

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'transaction_type_id' => 2

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'transaction_type_id' => 1

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'transaction_type_id' => 2

			]
		]);
    }
}
