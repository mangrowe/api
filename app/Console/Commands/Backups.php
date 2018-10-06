<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Backups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backups:run {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'MySQL database backups';

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
        $filename = $this->argument('filename');
        $command = sprintf('mysqldump --host=%s --port=%s --user=%s --password=%s %s > %s', escapeshellarg(env('DB_HOST')), escapeshellarg(env('DB_PORT')), escapeshellarg(env('DB_USERNAME')), escapeshellarg(env('DB_PASSWORD')), escapeshellarg(env('DB_DATABASE')), escapeshellarg(storage_path().'/database/'.$filename.'.sql'));
        $process = new Process($command);
        $process->setTimeout(999999999);
        $process->run();
        if ($process->isSuccessful()) {
            return true;
        }else {
            return $process->getErrorOutput();
        }
    }
}
