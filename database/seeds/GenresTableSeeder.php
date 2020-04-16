<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'Romanas'],
            ['id' => 2, 'title' => 'Drama'],
            ['id' => 3, 'title' => 'Detektyvas'],
            ['id' => 4, 'title' => 'Fantastika'],
            ['id' => 5, 'title' => 'Eilėraščiai'],
            ['id' => 6, 'title' => 'Enciklopedija'],
            ['id' => 7, 'title' => 'Istorija'],
            ['id' => 8, 'title' => 'Žodynas'],
            ['id' => 9, 'title' => 'Sveikata'],
            ['id' => 10, 'title' => 'Kulinarija'],
            ['id' => 11, 'title' => 'Menas']
        ];
        foreach ($items as $item) {
            DB::table('genres')->insert($item);
        }
    }
}
