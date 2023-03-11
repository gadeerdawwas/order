<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permissions
        $permissions = [
            // 'عرض صلاحيات',
            // 'إضافة صلاحيات',
            // 'تعديل صلاحيات',
            // 'حذف صلاحيات',

            // 'عرض زباين',
            // 'إضافة زباين',
            // 'تعديل زباين',
            // 'حذف زباين',

            // 'عرض موظفين',
            // 'إضافة موظفين',
            // 'تعديل موظفين',
            // 'حذف موظفين',

            // 'عرض طلبية',
            // 'إضافة طلبية',
            // 'تعديل طلبية',
            // 'حذف طلبية',

            'عرض مصاريف',
            'إضافة مصاريف',
            'تعديل مصاريف',
            'حذف مصاريف',

            'عرض ملاحظات',
            'إضافة ملاحظات',
            // 'تعديل ملاحظات',
            // 'حذف ملاحظات',

            // 'عرض طلب',
            // 'إضافة طلب',
            // 'تعديل طلب',
            // 'حذف طلب',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
