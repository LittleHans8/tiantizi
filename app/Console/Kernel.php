<?php

namespace App\Console;

use App\GiftCodeLog;
use App\NodeOnlineLog;
use App\Role;
use App\ScheduleLog;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Psy\Command\Command;
use Ramsey\Uuid\Converter\TimeConverterInterface;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\GenerateGiftCode::class,
        Commands\CreateAdmin::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
             $this->randomOnlineUser();
        })->everyTenMinutes();

        $schedule->call(function () {
            $this->clearTraffic();
        })->monthlyOn(1, '00:01'); // 每个月1号凌晨1点清除用户的流量

        $schedule->call(function () {
            $this->resetUser();
        })->dailyAt('00:01');
    }

    protected function clearTraffic()
    {
        $users = User::where('is_vip', 1)->get();
        foreach ($users as $user) {
            $user->u = 0;
            $user->d = 0;
            $user->save();
            $schedule_log = new ScheduleLog();
            $schedule_log->text = "月末会员流量清零";
            $schedule_log->save();
        }
    }

    protected function resetUser()
    {
        $now_time = time();
        $users = User::where('is_vip', 1)->get();
        $free_role = Role::where('name', 'free')->first();
        foreach ($users as $user) {
            $expired_time = strtotime($user->expired_at);
            if ($now_time >= $expired_time) {
                $user->is_vip = 0;
                $user->transfer_enable = 0;
                $user->u = 0;
                $user->d = 0;
                $user->roles()->sync($free_role);
                $user->save();
                $schedule_log = new ScheduleLog();
                $schedule_log->text = "会员过期";
                $schedule_log->user_id = $user->id;
                $schedule_log->save();
            }
        }
    }

    protected function randomOnlineUser()
    {
        $H = date('H');
        if (4 <= $H && 10 >= $H) { // 凌晨 4点到早上10点
            $online_count = rand(1, 10);
        } elseif ($H > 10 && $H <= 17) { // 早上十点到晚上5点
            $online_count = rand(10, 100);
        } else {
            $online_count = rand(50, 200);
        }
        $log = new NodeOnlineLog();
        $log->node_id = 1;
        $log->log_time = time();
        $log->online_user = $online_count;
        $log->save();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}