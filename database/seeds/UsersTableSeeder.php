<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
        $adminUsers   = [];
        $password     = bcrypt('test');

        DB::table('users')->insert([
            'id'         => 1,
            'name'       => 'Test',
            'email'      => 'test@fullspeed.co.jp',
            'password'   => $password,
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        for ($i = 0; $i < 100; ++$i) {
            $adminUsers[] = [
                'name'       => $this->faker->name,
                'email'      => $this->faker->unique()->email,
                'password'   => $password,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
            ];
        }
        DB::table('users')->insert($adminUsers);
    }
}
