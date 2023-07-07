<?php

namespace Database\Factories;


use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug,
            'image' => $this->faker->imageUrl(
                640,
                480,
                'animals',
                true
            ),
            'content' => $this->faker->realText(),
            'draft' => random_int(0, 1),
        ];
    }
}
