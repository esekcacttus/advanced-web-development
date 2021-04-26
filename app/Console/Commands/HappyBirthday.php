<?php

namespace App\Console\Commands;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:happy-birthday {birthdate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send happy birthday message to students...';

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
        $now = Carbon::parse($this->argument('birthdate'));
        $students = Student::where('birthdate', $now)->get();

        if($students){
            foreach ($students as $student){
                $this->info("Send happy birthday message for student: ".$student->first_name);
            }
        }

        return 0;
    }
}
