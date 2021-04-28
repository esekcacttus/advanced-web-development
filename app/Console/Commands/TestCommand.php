<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command tests';

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
        $name = $this->anticipate("Type your name by ARRAY", ['Filan', 'Filane', 'Fistek', 'John']);

        $this->info("The name by ARRAY: ".$name);

        $studentName = $this->anticipate("Type the name of student", function ($input){
            $studentNames = Student::where('first_name', 'LIKE', '%'.$input.'%')
                ->select('first_name')->get()->toArray();

            $names = [];
            foreach ($studentNames as $studentName){
                $names[] = $studentName['first_name'];
            }

            return $names;
        });

        $this->info("The name by DATABASE: ".$studentName);


        $color = $this->choice("Color", ['Red', 'Green', 'Blue']);
        $this->line("The choosen color is: ".$color);

        $headers = ["First Name", "Last Name"];
        $content = Student::all(['first_name', 'last_name'])->toArray();
        $this->table($headers, $content);

        $bar = $this->output->createProgressBar(100);

        $bar->start();

        for($i=0; $i<100; $i++){
            $bar->advance();
            sleep(1);
        }

        $bar->finish();
        return 0;
    }
}
