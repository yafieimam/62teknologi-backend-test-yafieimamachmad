<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_type')->insert([
			[
				'transaction_name' => 'delivery'

			],
            [
				'transaction_name' => 'pickup'

			]
		]);
    }
}
