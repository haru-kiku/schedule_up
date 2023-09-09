<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $dateStr = Carbon::now()->toDateString(); //今日の年月日を取得
        $start = Carbon::create($dateStr) //今日の日付から前後一ヶ月で入る時間
            ->addDay(random_int(-30, 30))
            ->addhour(random_int(9, 18));
        $end = Carbon::create($start)->addHour(random_int(1, 3)); //スタートの時間から1,2,3時間
        return [
            'user_id' => 1,
            'title' => $this->faker->word(),
            'body' => $this->faker->realText(255),
            'start' => $start,
            'end' => $end
        ];
    }
}
