<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
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
				'alias' => 'levain-bakery-new-york',
                'name' => 'Levain Bakery',
                'image_url' => 'https://s3-media3.fl.yelpcdn.com/bphoto/DH29qeTmPotJbCSzkjYJwg/o.jpg',
                'is_closed' => false,
                'url' => 'https://www.yelp.com/biz/levain-bakery-new-york?adjust_creative=DSj6I8qbyHf-Zm2fGExuug&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_search&utm_source=DSj6I8qbyHf-Zm2fGExuug',
                'review_count' => 9432,
                'rating' => 4.5,
                'price' => 2,
                'phone' => '+19174643769',
                'display_phone' => '(917) 464-3769',
                'distance' => 8115.903194093832

			],
            [
				'business_id' => 'V7lXZKBDzScDeGB8JmnzSA',
				'alias' => 'katzs-delicatessen-new-york',
                'name' => "Katz's Delicatessen",
                'image_url' => 'https://s3-media1.fl.yelpcdn.com/bphoto/1_2gtvgqMyuSgVJoCP6BQw/o.jpg',
                'is_closed' => false,
                'url' => 'https://www.yelp.com/biz/katzs-delicatessen-new-york?adjust_creative=DSj6I8qbyHf-Zm2fGExuug&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_search&utm_source=DSj6I8qbyHf-Zm2fGExuug',
                'review_count' => 14600,
                'rating' => 4,
                'price' => 2,
                'phone' => '+12122542246',
                'display_phone' => '(212) 254-2246',
                'distance' => 1836.553222671626

			],
            [
				'business_id' => '44SY464xDHbvOcjDzRbKkQ',
				'alias' => 'ippudo-ny-new-york-7',
                'name' => 'Ippudo NY',
                'image_url' => 'https://s3-media1.fl.yelpcdn.com/bphoto/zF3EgqHCk7zBUwD2B3WTEA/o.jpg',
                'is_closed' => false,
                'url' => 'https://www.yelp.com/biz/ippudo-ny-new-york-7?adjust_creative=DSj6I8qbyHf-Zm2fGExuug&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_search&utm_source=DSj6I8qbyHf-Zm2fGExuug',
                'review_count' => 10541,
                'rating' => 4,
                'price' => 2,
                'phone' => '+12123880088',
                'display_phone' => '(212) 388-0088',
                'distance' => 2820.7453024396

			]
		]);
    }
}
