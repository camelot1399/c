<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'specialist_id' => $this->faker->randomNumber(2),
            'user_id' => $this->faker->randomNumber(2),
            'book_id' => $this->faker->randomNumber(2),
            'value' => $this->faker->randomElement([1,2,3,4,5]),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'body_text' => $this->faker->text(),
        ];
    }
}
