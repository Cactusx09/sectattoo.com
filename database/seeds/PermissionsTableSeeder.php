<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '17',
                'title'      => 'asset_management_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '18',
                'title'      => 'asset_category_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '19',
                'title'      => 'asset_category_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '20',
                'title'      => 'asset_category_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '21',
                'title'      => 'asset_category_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '22',
                'title'      => 'asset_category_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '33',
                'title'      => 'asset_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '34',
                'title'      => 'asset_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '35',
                'title'      => 'asset_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '36',
                'title'      => 'asset_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '37',
                'title'      => 'asset_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '38',
                'title'      => 'assets_history_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '39',
                'title'      => 'text_management_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '40',
                'title'      => 'question_create',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '41',
                'title'      => 'question_edit',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '42',
                'title'      => 'question_show',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '43',
                'title'      => 'question_delete',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
            [
                'id'         => '44',
                'title'      => 'question_access',
                'created_at' => '2019-09-03 12:55:56',
                'updated_at' => '2019-09-03 12:55:56',
            ],
        ];

        Permission::insert($permissions);
    }
}
