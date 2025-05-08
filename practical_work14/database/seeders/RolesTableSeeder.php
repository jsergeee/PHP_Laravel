<?php

namespace Database\Seeders; // <-- Namespace должен быть правильным

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role; // <-- Использует модель Role из Voyager

class RolesTableSeeder extends Seeder // <-- *** ИМЯ КЛАССА ДОЛЖНО БЫТЬ RolesTableSeeder ***
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        // Используйте firstOrNew, чтобы не создавать роли, если они уже существуют
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->display_name = __('voyager::seeders.roles.admin');
            $role->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->display_name = __('voyager::seeders.roles.user');
            $role->save();
        }

        // Если у вас есть другие стандартные роли Voyager, они будут здесь
    }
}