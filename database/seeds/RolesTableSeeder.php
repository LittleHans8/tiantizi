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
        $this->saveRole('super_admin', '超级管理员', '最高权限的管理员');
        $this->saveRole('admin', '普通管理员', '普通权限的管理员，具体权限待定');
        $this->saveRole('agent', '代理商', '代理商');
        $this->saveRole('vip3', 'vip3', 'vip 10%，大流量版套餐');
        $this->saveRole('vip2', 'vip2', 'vip 7%，中流量版套餐');
        $this->saveRole('vip1', 'vip1', 'vip1 5%，，小流量版套餐');
        $this->saveRole('free', '免费用户', '免费用户，前往天梯子公益免费ss站,提成2%');
    }

    private function saveRole($name, $display_name, $description)
    {
        $role = new Role();
        $role->name = $name;
        $role->display_name = $display_name;
        $role->description = $description;
        $role->save();
    }

}
