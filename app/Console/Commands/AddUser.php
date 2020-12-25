<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adduser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will add a new dummy user in users table';

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
     * @return int
     */
    public function handle()
    {
        Factory(User::class,1)->create();
    }
}
