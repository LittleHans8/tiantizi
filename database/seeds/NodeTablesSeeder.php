<?php

use App\Node;
use Illuminate\Database\Seeder;

class NodeTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->saveNode('免费节点1', 'free.sshide.com', 0);
        $this->saveNode('免费节点2', 'free.sshide.com', 0);
        $this->saveNode('测试节点1', 'vip1.sshide.com');
        $this->saveNode('测试节点2', 'vip2.sshide.com');
        $this->saveNode('测试节点3', 'vip3.sshide.com');
    }

    public function saveNode($name, $domain, $type = 1)
    {
        $node = new Node();
        $node->name = $name;
        $node->domain = $domain;
        $node->info = '移动优秀';
        $node->type = $type;
        $node->save();
    }
}
