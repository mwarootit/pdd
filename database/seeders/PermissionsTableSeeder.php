<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'boat_engine_phase_one_create',
            ],
            [
                'id'    => 18,
                'title' => 'boat_engine_phase_one_edit',
            ],
            [
                'id'    => 19,
                'title' => 'boat_engine_phase_one_show',
            ],
            [
                'id'    => 20,
                'title' => 'boat_engine_phase_one_delete',
            ],
            [
                'id'    => 21,
                'title' => 'boat_engine_phase_one_access',
            ],
            [
                'id'    => 22,
                'title' => 'boat_engine_phase_two_create',
            ],
            [
                'id'    => 23,
                'title' => 'boat_engine_phase_two_edit',
            ],
            [
                'id'    => 24,
                'title' => 'boat_engine_phase_two_show',
            ],
            [
                'id'    => 25,
                'title' => 'boat_engine_phase_two_delete',
            ],
            [
                'id'    => 26,
                'title' => 'boat_engine_phase_two_access',
            ],
            [
                'id'    => 27,
                'title' => 'development_project_create',
            ],
            [
                'id'    => 28,
                'title' => 'development_project_edit',
            ],
            [
                'id'    => 29,
                'title' => 'development_project_show',
            ],
            [
                'id'    => 30,
                'title' => 'development_project_delete',
            ],
            [
                'id'    => 31,
                'title' => 'development_project_access',
            ],
            [
                'id'    => 32,
                'title' => 'list_of_ministry_project_create',
            ],
            [
                'id'    => 33,
                'title' => 'list_of_ministry_project_edit',
            ],
            [
                'id'    => 34,
                'title' => 'list_of_ministry_project_show',
            ],
            [
                'id'    => 35,
                'title' => 'list_of_ministry_project_delete',
            ],
            [
                'id'    => 36,
                'title' => 'list_of_ministry_project_access',
            ],
            [
                'id'    => 37,
                'title' => 'fish_center_create',
            ],
            [
                'id'    => 38,
                'title' => 'fish_center_edit',
            ],
            [
                'id'    => 39,
                'title' => 'fish_center_show',
            ],
            [
                'id'    => 40,
                'title' => 'fish_center_delete',
            ],
            [
                'id'    => 41,
                'title' => 'fish_center_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
