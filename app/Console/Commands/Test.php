<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:mail {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print My Email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->error('Your Email Run Successfully');
        $this->info('Your Email Run Successfully');
    }
}
