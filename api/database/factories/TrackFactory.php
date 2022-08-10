<?php

namespace Database\Factories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Track::class;



  /**
   * Create a new factory instance for the model.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  protected static function newFactory()
  {
    return Track::new();
  }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'order' => fake()->randomNumber(1),
			'remixOrVersion' => fake()->paragraph(),
			'createdBy' => fake()->paragraph(),
			'title' => fake()->text(50),
			'primaryGenre' => fake()->paragraph(),
			'secondaryGenre' => fake()->paragraph(),
			'iswcCode' => fake()->paragraph(),
			'publishingRights' => fake()->paragraph(),
			'language' => fake()->paragraph(),
			'isAvaibleSeparately' => fake()->paragraph(),
			'startPointTime' => fake()->unixTime(),
			'notes' => fake()->paragraph(),
			'sold' => fake()->randomNumber(3),
        ];
    }
}
