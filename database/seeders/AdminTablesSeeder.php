<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name'     => 'Administrator',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
            [
                'name'        => 'User management',
                'slug'        => 'user.management',
                'http_method' => '',
                'http_path'   => "/users",
            ],
            [
                'name'        => 'Projects management',
                'slug'        => 'projects.management',
                'http_method' => '',
                'http_path'   => "/projects",
            ],
            [
                'name'        => 'Sales management',
                'slug'        => 'sales.management',
                'http_method' => '',
                'http_path'   => "/sales",
            ],
            [
                'name'        => 'Conditions management',
                'slug'        => 'conditions.management',
                'http_method' => '',
                'http_path'   => "/conditions",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => 'Dashboard',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => 'Admin',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 0,
                'order'     => 3,
                'title'     => '????????????',
                'icon'      => 'fa-user',
                'uri'       => '/users',
            ],
            [
                'parent_id' => 0,
                'order'     => 4,
                'title'     => '????????????',
                'icon'      => 'fa-cubes',
                'uri'       => '/sales',
            ],
            [
                'parent_id' => 0,
                'order'     => 5,
                'title'     => '????????????',
                'icon'      => 'fa-diamond',
                'uri'       => '/prizes',
            ],
            [
                'parent_id' => 0,
                'order'     => 6,
                'title'     => '????????????',
                'icon'      => 'fa-database',
                'uri'       => '/conditions',
            ],
            [
                'parent_id' => 0,
                'order'     => 7,
                'title'     => '?????????',
                'icon'      => 'fa-dollar',
                'uri'       => '/coupons',
            ],
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => '????????????',
                'icon'      => 'fa-car',
                'uri'       => '/programs',
            ],
            [
                'parent_id' => 0,
                'order'     => 9,
                'title'     => '????????????',
                'icon'      => 'fa-tag',
                'uri'       => '/tools',
            ],
            [
                'parent_id' => 0,
                'order'     => 10,
                'title'     => '????????????',
                'icon'      => 'fa-image',
                'uri'       => '/images',
            ],
            [
                'parent_id' => 0,
                'order'     => 11,
                'title'     => '????????????',
                'icon'      => 'fa-newspaper-o',
                'uri'       => '/records',
            ],

            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => 'Users',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => 'Roles',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => 'Permission',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => 'Menu',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => 'Operation log',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ],
        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(Role::first());
    }
}
