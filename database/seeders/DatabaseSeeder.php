<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Application;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'xin@tcs.com',
        ]);

        $users = User::all();

        //create 10 employers
        for ($i = 0; $i < 10; $i++) {
            $employer = Employer::factory()->create([
                'user_id' => $users->random()->id
            ]);

            //create 5 jobs for each employer
            $jobs = Job::factory(5)->create([
                'employer_id' => $employer->id
            ]);

            //create a random number of applications for each job.
            //the applicant can't be the employer.
            foreach ($jobs as $job) {
                Application::factory(random_int(1, 10))->create([
                    'job_id' => $job->id,
                    'user_id' => fn () => $users->except($employer->user_id)->random()
                ]);
            }
        }
    }
}
