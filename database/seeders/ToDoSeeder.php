<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Todo;
use App\Models\TodoTranslation;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langEng = Language::factory()->create([
            'code' => 'en'
        ]);

        $langRu = Language::factory()->create([
            'code' => 'ru'
        ]);

        $langEsp = Language::factory()->create([
            'code' => 'es'
        ]);

        $faker = FakerFactory::create('en_US');

        Todo::factory()
            ->has(
                TodoTranslation::factory()
                    ->state(function (array $attributes, Todo $todo) use ($faker, $langEng) {
                        return [
                            'title' => $faker->sentence,
                            'description' => $faker->text,
                            'language_id' => $langEng->id
                        ];
                    }),
                'translations'
            )->count(5)->create();

        $faker = FakerFactory::create('ru_RU');


        Todo::factory()->has(
            TodoTranslation::factory()
                ->state(function (array $attributes, Todo $todo) use ($faker, $langRu) {
                    return [
                        'title' => $faker->sentence,
                        'description' => $faker->realText,
                        'language_id' => $langRu->id
                    ];
                })
            ,
            'translations'
        )->count(5)->create();
    }
}
