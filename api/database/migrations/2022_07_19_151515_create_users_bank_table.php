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
			Schema::create('users_bank', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\User::class)->nullable();
				$table->string('accountName')->nullable();
				$table->string('accountId')->nullable();
				$table->string('isfcCode')->nullable();
				$table->string('sortCode')->nullable();
				$table->string('swiftCode')->nullable();
				$table->string('ibanId')->nullable();
				$table->string('countryOfBank')->nullable();
				$table->string('bankName')->nullable();
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
			Schema::dropIfExists('users_bank');
		}
	};
