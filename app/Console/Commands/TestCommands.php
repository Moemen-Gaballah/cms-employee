<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// added for me
use App\Worker;
use App\Absence;


class TestCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'myproject:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this custom Commend Can Be add presence My Project';

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
        $workers = Worker::all();
        foreach ($workers as $worker) {

            $absenceUnique = Absence::where('worker_id', '=', $worker->id)->where('date', '=', date("Y-m-d", time()))->count();

            if($absenceUnique == 0){
                $presence = new Absence();
                $presence->worker_id = $worker->id;
                $presence->presence = 'presence';
                $presence->notes = 'Null';
                $presence->date = date("Y-m-d", time());
                $presence->save();
            }
        }
    }
}
