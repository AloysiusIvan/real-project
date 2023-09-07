<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currentDateTime = Carbon::now();
    
            DB::table('trn_booking')
                ->whereDate('tanggal', '<=', $currentDateTime->toDateString())
                ->where('jam_selesai', '<=', $currentDateTime->toTimeString())
                ->where('status','=',null)
                ->update(['status' => 'expired']);
        })->everyFiveMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
