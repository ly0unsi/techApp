<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'image' => $this->faker->name,
            'desc' => $this->faker->name,
            'body' => $this->faker->text,
            'slug' => Str::slug($this->faker->name),
            'user_id' => auth()->user->id,
            'category_id' => $this->faker->randomDigit
        ];
    }
}
