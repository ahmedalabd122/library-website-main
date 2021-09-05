<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Book::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'title' => $this->faker->sentence(),
      'description' => $this->faker->paragraph(),
      'cover' => $this->faker->imageUrl(),
      'category_id' => Category::inRandomOrder()->first() ?? 1,
      'author_id' => Author::inRandomOrder()->first() ?? 1,
    ];
  }
}
