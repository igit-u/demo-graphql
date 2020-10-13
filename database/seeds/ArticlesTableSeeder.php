<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class ArticlesTableSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [];

        $users = User::query()->get();
        foreach ($users as $user) {
            $articles[] = [
                'user_id'   => $user->id,
                'name'       => $this->faker->text(20),
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
