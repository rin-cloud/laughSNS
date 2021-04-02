<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class LaughsnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'user_id'    => $i,
                'entertainer'=> 'これはテスト投稿' .$i,
                'recommend' => 'これはテスト投稿' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
