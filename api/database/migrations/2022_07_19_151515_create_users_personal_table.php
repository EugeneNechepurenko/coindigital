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
			Schema::create('users_personal', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\User::class)->nullable();
				$table->string('firstName')->nullable();
				$table->string('lastName')->nullable();
				$table->string('email')->nullable();
				$table->string('country')->nullable();
				$table->string('defaultLanguage')->nullable();
				$table->string('city')->nullable();
				$table->string('street')->nullable();
				$table->string('postalCode')->nullable();
				$table->string('contactPhone')->nullable();
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
			Schema::dropIfExists('users_personal');
		}
	};
