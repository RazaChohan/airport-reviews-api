<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoadCsvDataCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'load:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads Data from csv into the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info('it works!');
    }

}