<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class view extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create View';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $argument = $this->argument('view');
        $path = $this->replace($argument);
        $this->checkName($path);
        if (File::exists($path)) {
             $this->error('this file alrede existed');
            return;
        }
        File::put($path,$path);
        $this->info('created file');
    }

    public function replace($argument)
    {
        $replace = \str_replace('.','/', $argument) . '.blade.php';
        $FullPath = "resources/views/{$replace}";
        return $FullPath;
    }

    public function checkName($FullPath)
    {

        $directore = dirname($FullPath);
        if(!\file_exists($directore)){

            mkdir($directore,0777,true);
        }
    }
}
