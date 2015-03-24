<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Assets extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy assets from vendor folder into the multiple destinations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // move font awesome
        // move jquery
        // move twitter bootstrap
    }

}
