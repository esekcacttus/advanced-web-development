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

        $studentCount = count($students);

        if ($studentCount == 0) {
            $this->info("No students found!");
            return;
        }

        $sendLimit = $this->ask($studentCount . " students found. Please type the number of students who will receive the email");
        $sendLimit = intval($sendLimit);

        if ($sendLimit > $studentCount || $sendLimit == 0) {
            $this->error("The send limit is invalid!");
            return;
        }

        $password = $this->secret("Type the password to proceed");

        if ($password != "1234") {
            $this->error("Not authenticated!");
            return;
        }

        for ($i = 0; $i < $sendLimit; $i++) {
            $student = $students[$i];
            $this->info("Send happy birthday message for student: " . $student->first_name);
        }

        if($this->confirm("Do you want to exit?")){
            $this->info("Exit!");
        }else{
            $this->info("Don't Exit!");
        }

        return 0;
    }
}
