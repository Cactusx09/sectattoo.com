<?php

use App\Text;
use Illuminate\Database\Seeder;

class TextsSeeder extends Seeder
{
    public function run()
    {
        $texts = [
            [
                'id'         => 1,
                'name'      => 'bio',
                'value'      => '',
                'created_at' => '2019-09-03 12:53:00',
                'updated_at' => '2019-09-03 12:53:00',
            ],
            [
                'id'         => 2,
                'name'      => 'phone',
                'value'      => '12345678',
                'created_at' => '2019-09-03 12:53:00',
                'updated_at' => '2019-09-03 12:53:00',
            ],
            [
                'id'         => 3,
                'name'      => 'mail',
                'value'      => 'admin@sectattoo.com',
                'created_at' => '2019-09-03 12:53:00',
                'updated_at' => '2019-09-03 12:53:00',
            ],
            [
                'id'         => 4,
                'name'      => 'instagram',
                'value'      => '',
                'created_at' => '2019-09-03 12:53:00',
                'updated_at' => '2019-09-03 12:53:00',
            ],
            [
                'id'         => 5,
                'name'      => 'facebook',
                'value'      => '',
                'created_at' => '2019-09-03 12:53:00',
                'updated_at' => '2019-09-03 12:53:00',
            ],
        ];

        Text::insert($texts);
    }
}
