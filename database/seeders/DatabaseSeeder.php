<?php

namespace Database\Seeders;

use App\Models\Interests;
use App\Models\User;
use App\Models\UserInterests;
use Database\Factories\UserInterestsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Interests::truncate();
        UserInterests::truncate();

        Interests::factory()->count(4)->state(new Sequence(['interest' => 'Reading'],
        ['interest' => 'Video Games'],
        ['interest' => 'Sports'],
        ['interest' => 'Travelling']))->create();

        \App\Models\User::factory(10)->create();
        $users = User::all();
        foreach ($users as $key => $user) {
            $interests = Interests::inRandomOrder()->limit(rand(1,4))->pluck('id')->toArray();
            foreach ($interests as $key2 => $interest_id) {
                UserInterests::factory()->create([ 'interest_id' => $interest_id, 'user_id' => $user->id ]);
            }
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
