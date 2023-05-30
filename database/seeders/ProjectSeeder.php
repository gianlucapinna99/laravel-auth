<?php

namespace Database\Seeders;

use App\Models\Project;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $new_project = new Project();
            $new_project->project_name = substr($faker->word, 0, 8);
            $new_project->client = $faker->company();
            $new_project->project_description = $faker->sentence();
            $new_project->start_date = $faker->dayOfMonth . '-' . $faker->month;
            $new_project->end_date = DateTime::createFromFormat('j-n', $new_project->start_date)->modify('+4 weeks')->format('j-n');
            $new_project->revenue = $faker->randomFloat(2, 100, 10000);
            $new_project->is_completed = $faker->numberBetween(0, 1);
            $new_project->slug = Str::slug($new_project->project_name, '-');
            $new_project->save();
        }
    }
}
