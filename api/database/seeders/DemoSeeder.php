<?php

namespace Database\Seeders;

use App\Models\Release;
use App\Models\Track;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){



      Track::factory()->count(10)->create();





      /*
       *

          {




		Role::create([
						 'remixOrVersion' => fake()->paragraph(),
						 'primaryGenre' => fake()->paragraph(),
						 'secondaryGenre' => fake()->paragraph(),
						 'language' => fake()->paragraph(),
						 'albumFormat' => fake()->paragraph(),
						 'upc' => fake()->paragraph(),
						 'referenceNumber' => fake()->paragraph(),
						 'grId' => fake()->paragraph(),
						 'description' => fake()->paragraph(),
						 'priceCategory' => fake()->paragraph(),
						 'digitalReleaseDate' => fake()->paragraph(),
						 'originalReleaseDate' => fake()->paragraph(),
						 'licenseType' => fake()->paragraph(),
						 'territories' => fake()->paragraph(),
						 'isDistributed' => fake()->paragraph(),
						 'licenseHolderYear' => fake()->paragraph(),
						 'licenseHolderValue' => fake()->paragraph(),
						 'copyrightRecordingYear' => fake()->paragraph(),
						 'copyrightRecordingValue' => fake()->paragraph(),
		])
		->has(
			Track::factory()->create([
										 'order' => fake()->randomNumber(1),
										 'remixOrVersion' => fake()->paragraph(),
										 'createdBy' => fake()->paragraph(),
										 'title' => fake()->paragraph(),
										 'primaryGenre' => fake()->paragraph(),
										 'secondaryGenre' => fake()->paragraph(),
										 'iswcCode' => fake()->paragraph(),
										 'publishingRights' => fake()->paragraph(),
										 'language' => fake()->paragraph(),
										 'isAvaibleSeparately' => fake()->paragraph(),
										 'startPointTime' => fake()->unixTime(),
										 'notes' => fake()->paragraph(),
										 'sold' => fake()->randomNumber(3),
									 ])->count(3)
		)
			->count(3);
    */
    }
}
