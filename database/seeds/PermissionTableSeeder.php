<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => '1',
                'name' => 'user-list',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'users.index',
            ], [
                'id' => '2',
                'name' => 'user-create',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'users.create,users.store',
            ], [
                'id' => '3',
                'name' => 'user-edit',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'users.edit,users.update',
            ], [
                'id' => '4',
                'name' => 'user-delete',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'users.destroy',
            ], [
                'id' => '5',
                'name' => 'role-list',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'roles.index',
            ], [
                'id' => '6',
                'name' => 'role-create',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'roles.create,roles.store',
            ], [
                'id' => '7',
                'name' => 'role-edit',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'roles.edit,roles.update',
            ], [
                'id' => '8',
                'name' => 'role-delete',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'roles.destroy',
            ], [
                'id' => '9',
                'name' => 'language',
                'display_name' => 'اللغه',
                'guard_name' => 'web',
                'routes' => 'lang',
            ], [
                'id' => '10',
                'name' => 'topic-list',
                'display_name' => 'المواضيع',
                'guard_name' => 'web',
                'routes' => 'topics.index',
            ], [
                'id' => '11',
                'name' => 'topic-create',
                'display_name' => 'المواضيع',
                'guard_name' => 'web',
                'routes' => 'topics.create,topics.store',
            ], [
                'id' => '12',
                'name' => 'topic-edit',
                'display_name' => 'المواضيع',
                'guard_name' => 'web',
                'routes' => 'topics.edit,topics.update',
            ], [
                'id' => '13',
                'name' => 'topic-delete',
                'display_name' => 'المواضيع',
                'guard_name' => 'web',
                'routes' => 'topics.destroy',
            ], [
                'id' => '14',
                'name' => 'user-show',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'users.show',
            ], [
                'id' => '15',
                'name' => 'role-show',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'roles.show',
            ], [
                'id' => '16',
                'name' => 'question-list',
                'display_name' => 'الاسئله',
                'guard_name' => 'web',
                'routes' => 'questions.index',
            ], [
                'id' => '17',
                'name' => 'question-create',
                'display_name' => 'الاسئله',
                'guard_name' => 'web',
                'routes' => 'questions.create,questions.store',
            ], [
                'id' => '18',
                'name' => 'question-edit',
                'display_name' => 'الاسئله',
                'guard_name' => 'web',
                'routes' => 'questions.edit,questions.update',
            ], [
                'id' => '19',
                'name' => 'question-delete',
                'display_name' => 'الاسئله',
                'guard_name' => 'web',
                'routes' => 'questions.destroy',
            ], [
                'id' => '20',
                'name' => 'question-show',
                'display_name' => 'الاسئله',
                'guard_name' => 'web',
                'routes' => 'questions.show',
            ], [
                'id' => '21',
                'name' => 'option-list',
                'display_name' => 'الاختيارات',
                'guard_name' => 'web',
                'routes' => 'options.index',
            ], [
                'id' => '22',
                'name' => 'option-create',
                'display_name' => 'الاختيارات',
                'guard_name' => 'web',
                'routes' => 'options.create,options.store',
            ], [
                'id' => '23',
                'name' => 'option-edit',
                'display_name' => 'الاختيارات',
                'guard_name' => 'web',
                'routes' => 'options.edit,options.update',
            ], [
                'id' => '24',
                'name' => 'option-delete',
                'display_name' => 'الاختيارات',
                'guard_name' => 'web',
                'routes' => 'options.destroy',
            ], [
                'id' => '25',
                'name' => 'option-show',
                'display_name' => 'الاختيارات',
                'guard_name' => 'web',
                'routes' => 'options.show',
            ], [
                'id' => '26',
                'name' => 'test-list',
                'display_name' => 'الامتحانات',
                'guard_name' => 'web',
                'routes' => 'tests.index',
            ], [
                'id' => '27',
                'name' => 'test-create',
                'display_name' => 'الامتحانات',
                'guard_name' => 'web',
                'routes' => 'tests.create,tests.store',
            ], [
                'id' => '28',
                'name' => 'test-edit',
                'display_name' => 'الامتحانات',
                'guard_name' => 'web',
                'routes' => 'tests.edit,tests.update',
            ], [
                'id' => '29',
                'name' => 'test-delete',
                'display_name' => 'الامتحانات',
                'guard_name' => 'web',
                'routes' => 'tests.destroy',
            ], [
                'id' => '30',
                'name' => 'test-show',
                'display_name' => 'الامتحانات',
                'guard_name' => 'web',
                'routes' => 'tests.show',
            ], [
                'id' => '31',
                'name' => 'result-list',
                'display_name' => 'النتائج',
                'guard_name' => 'web',
                'routes' => 'results.index',
            ], [
                'id' => '32',
                'name' => 'result-create',
                'display_name' => 'النتائج',
                'guard_name' => 'web',
                'routes' => 'results.create,results.store',
            ], [
                'id' => '33',
                'name' => 'result-edit',
                'display_name' => 'النتائج',
                'guard_name' => 'web',
                'routes' => 'results.edit,results.update',
            ], [
                'id' => '34',
                'name' => 'result-delete',
                'display_name' => 'النتائج',
                'guard_name' => 'web',
                'routes' => 'results.destroy',
            ], [
                'id' => '35',
                'name' => 'result-show',
                'display_name' => 'النتائج',
                'guard_name' => 'web',
                'routes' => 'results.show',
            ],
        ];


        Permission::insert($permissions);
    }
}
