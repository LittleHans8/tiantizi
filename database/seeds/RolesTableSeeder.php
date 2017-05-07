<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->saveRoles('super_admin', '超级管理员', '最高权限的管理员');
        $this->saveRoles('admin', '普通管理员', '普通权限的管理员，具体权限待定');
        $this->saveRoles('agent', '代理商', '代理商');
        $this->saveRoles('vip3', 'vip3', 'vip，大流量版套餐');
        $this->saveRoles('vip2', 'vip2', 'vip，中流量版套餐');
        $this->saveRoles('vip1', 'vip1', 'vip，小流量版套餐');
        $this->saveRoles('free', '免费用户', '免费用户，前往天梯子公益免费ss站');
    }

    private function saveRoles($name, $display_name, $description)
    {
        $role = new Role();
        $role->name = $name;
        $role->display_name = $display_name;
        $role->description = $description;
        $role->save();
    }

}
