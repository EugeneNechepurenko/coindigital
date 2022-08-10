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
			Schema::create('label_release', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\Release::class);
				$table->foreignIdFor(\App\Models\Label::class);
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
			Schema::dropIfExists('track_store');
		}
	};
	
	
	
	
	
