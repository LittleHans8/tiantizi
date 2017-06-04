<?php

namespace App\Console\Commands;

use App\Role;
use App\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {--email=} {--name=} {--password=123456} {--port=0} {--role=free}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user from console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->option('email');
        $name = $this->option('name');
        $password = $this->option('password');
        $port = $this->option('port');
        $role_name = $this->option('role');
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = bcrypt($password);
        if (!empty($port)) {
            $user->port = $port;
        }
        $role = Role::where('name', $role_name)->get()->first();
        $user->save();
        $user->attachRole($role);
    }
}
