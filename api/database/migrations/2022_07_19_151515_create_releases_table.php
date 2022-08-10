<?php

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
			Schema::create('releases', function (Blueprint $table) {
				$table->id();
        		$table->string('remixOrVersion')->nullable();
        		$table->string('primaryGenre')->nullable();
        		$table->string('secondaryGenre')->nullable();
        		$table->string('language')->nullable();
        		$table->string('albumFormat')->nullable();
        		$table->string('upc')->nullable();
        		$table->string('referenceNumber')->nullable();
        		$table->string('grId')->nullable();
        		$table->string('description')->nullable();
        		$table->string('priceCategory')->nullable();
        		$table->string('digitalReleaseDate')->nullable();
        		$table->string('originalReleaseDate')->nullable();
        		$table->string('licenseType')->nullable();
        		$table->string('territories')->nullable();
        		$table->string('isDistributed')->nullable();
				
        		$table->string('licenseHolderYear')->nullable();
        		$table->string('licenseHolderValue')->nullable();
        		$table->string('copyrightRecordingYear')->nullable();
        		$table->string('copyrightRecordingValue')->nullable();
				
				$table->foreignIdFor(\App\Models\Label::class)->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('releases');
		}
	};
