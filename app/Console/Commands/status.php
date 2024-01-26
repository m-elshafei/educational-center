<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class status extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change status for all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->status == 0) {
                $user->update(['status' => 1]);
            }else {
                $user->update(['status' => 0]);
            }
        }
    }
}
