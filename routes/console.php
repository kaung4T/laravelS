<?php

use App\Console\Commands\GG;
use App\Console\Commands\MailSchedule;
use App\Console\Commands\TestS;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(MailSchedule::class)->everyFiveSeconds();
