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
			Schema::create('users_tds', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\User::class)->nullable();
				$table->string('type')->nullable();
				$table->string('value')->nullable();
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
			Schema::dropIfExists('users_tds');
		}
	};
