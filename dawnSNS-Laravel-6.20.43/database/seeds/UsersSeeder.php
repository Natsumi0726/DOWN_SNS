<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        // ユーザーを50人作成
        $users = User::factory()->count(50)->create();

        foreach($users as $user) {
            // フォローを追加
            $user->follows()->attach( User::find($faker->numberBetween($min = 1, $max = 50)) );
            // フォロワーを追加
            $user->followers()->attach( User::find($faker->numberBetween($min = 1, $max = 50)) );
    }
}
}