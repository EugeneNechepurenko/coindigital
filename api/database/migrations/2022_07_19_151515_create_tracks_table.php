<?php
	
	use App\Models\Release;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('tracks', function (Blueprint $table) {
				$table->id();
				$table->timestamps();
				$table->string('order')->nullable();
				$table->string('remixOrVersion')->nullable();
				$table->string('createdBy')->nullable();
				$table->string('title')->nullable();
				$table->string('primaryGenre')->nullable();
				$table->string('secondaryGenre')->nullable();
				$table->string('iswcCode')->nullable();
				$table->string('publishingRights')->nullable();
				$table->string('language')->nullable();
				$table->string('isAvaibleSeparately')->nullable();
				$table->string('startPointTime')->nullable();
				$table->string('notes')->nullable();
				$table->string('sold')->nullable();
				$table->foreignIdFor(\App\Models\Release::class)->nullable();

			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('tracks');
		}
	};
