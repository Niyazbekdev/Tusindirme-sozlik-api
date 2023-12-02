<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'title' => [
                'latin' => 'atlıq',
                'kiril' => 'атлык',
            ],
            'description' => [
                'latin' => 'Zattıń atın bildirip kim?, ne? sorawlarına juwap beretuǵın sóz shaqabına atlıq delinedi',
                'kiril' => 'Заттың атын билдирип ким?, не? сорауларына жуап беретуғын сөз шакабына атлык делинеди'
            ]
        ]);

        Category::create([
            'title' => [
                'latin' => 'kelbetlik',
                'kiril' => 'келбетлик',
            ],
            'description' => [
                'latin' => 'Zattıń sının, sıpatın, qásiyetin, kólemin, túr-túsin bildiretuǵın sózler kelbetlik dep ataladı',
                'kiril' => 'Заттиң сынин, сыпатын, қәсиетин, көлемин, тўр-тўсин билдиретуғын сөзлер келбетлик деп аталады'
            ]
        ]);

        Category::create([
            'title' => [
                'latin' => 'feyil',
                'kiril' => 'фейл',
            ],
            'description' => [
                'latin' => 'Zattıń is-xáreketin bildiretuǵın sózler feyil delinedi',
                'kiril' => 'Заттың ис-хәрекетин билдиретугын сөзлер фейл делинеди'
            ]
        ]);
    }
}
