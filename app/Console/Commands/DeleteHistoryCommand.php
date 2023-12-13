<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteHistoryCommand extends Command
{

    protected $signature = 'delete:history';

    protected $description = 'Command description';

    public function handle()
    {
        DB::table('user_word')->where('created_at','<=',Carbon::now()->subHours(7))->delete();
    }
}
