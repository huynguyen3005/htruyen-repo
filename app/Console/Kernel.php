<?php

namespace App\Console;

use App\Jobs\FectchComicsDaily;
use App\Jobs\ResetViewPerDayJob;
use App\Jobs\ResetViewPerMonthJob;
use App\Jobs\ResetViewPerWeekJob;
use App\Jobs\UpdateComicDescriptionJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new FectchComicsDaily)->hourly();
        $schedule->job(new UpdateComicDescriptionJob)->dailyAt('09:00');
        $schedule->job(new ResetViewPerDayJob)->dailyAt('02:00');
        $schedule->job(new ResetViewPerWeekJob)->mondays();
        $schedule->job(new ResetViewPerMonthJob)->monthly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
