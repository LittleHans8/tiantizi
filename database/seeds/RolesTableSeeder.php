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
        // 年费用户 和 月费用户的提成不一样
        $this->saveRole('super_admin', '超级管理员', '最高权限的管理员');
        $this->saveRole('admin', '普通管理员', '普通权限的管理员，具体权限待定');
        $this->saveRole('agent', '代理商', '代理商 15%');
        $this->saveRole('vip4', '大流量版', 'vip3 10%，大流量版套餐');
        $this->saveRole('vip3', '中流量版', 'vip3 10%，中流量版套餐');
        $this->saveRole('vip2', '小流量版', 'vip2 7%，小流量版套餐');
        $this->saveRole('vip1', '略小流量版', 'vip1 5%，，略小流量版套餐');
        $this->saveRole('free', '免费用户', '免费用户，前往天梯子公益免费ss站,提成3%');
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
