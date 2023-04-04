<?php

namespace Database\Seeders;

use App\Models\Course\Course;
use App\Models\Course\CourseModule;
use App\Models\Course\CourseModuleClass;
use App\Models\Course\CourseModuleClassQuestion;
use App\Models\Course\CourseModuleClassQuestionAnswer;
use App\Models\Course\CourseModuleClassResource;
use App\Models\Course\CourseModuleClassVideo;
use App\Models\Course\CourseReview;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
    }
}
