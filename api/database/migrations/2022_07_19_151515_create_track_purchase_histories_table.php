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
			Schema::create('track_purchase_history', function (Blueprint $table) {
				$table->string('albumName')->nullable();
				$table->string('name')->nullable();
				$table->string('platform')->nullable();
				$table->string('soldDate')->nullable();
				$table->string('grossPrice')->nullable();
				$table->string('netPrice')->nullable();
			});
		}
	
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('track_purchase_history');
		}
	};
