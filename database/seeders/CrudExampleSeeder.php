<?php

namespace Database\Seeders;

use App\Models\CrudExample;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CrudExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = \Faker\Factory::create('id_ID');
        $options = array_values(get_options());
        $radioOptions = array_values(get_options(4));
        foreach (range(1, 100) as $i) {
            $selectMultiple = [];
            foreach (range(1, Arr::random(range(1, 3))) as $j) {
                array_push($selectMultiple, $options[$j - 1]);
            }
            $checkbox = [];
            foreach (range(1, Arr::random(range(1, 3))) as $j) {
                array_push($checkbox, $options[$j - 1]);
            }
            array_push($data, [
                'text'              => Str::random(10),
                'number'            => $faker->numberBetween(1, 1000),
                'select'            => Arr::random($options),
                'select2'           => Arr::random($options),
                'select2_multiple'  => json_encode($selectMultiple),
                'textarea'          => $faker->text(100),
                'radio'             => Arr::random($radioOptions),
                'checkbox'          => json_encode($checkbox),
                'file'              => $faker->imageUrl,
                'date'              => $faker->date('Y-m-d'),
                'time'              => $faker->date('H:i:s'),
                'color'             => $faker->hexColor,
                'summernote_simple' => $faker->text(100),
                'summernote'        => $faker->text(100),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
        foreach (collect($data)->chunk(20) as $chunkData) {
            // dd($chunkData);
            CrudExample::insert($chunkData->toArray());
        }
    }
}
