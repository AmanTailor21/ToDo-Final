<?php

namespace App\Console\Commands;

use App\Events\MailEvent;
use Illuminate\Console\Command;

class demoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @param $user
     * @return int
     */
    public function handle()
    {
        $email =  $this->argument('user');
        echo $email;
        MailEvent::dispatch($email);
    }
}
