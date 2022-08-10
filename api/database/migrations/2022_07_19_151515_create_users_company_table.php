2022_07_19_151515_update_users_personal_table.php<?php

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
			Schema::create('users_company', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\User::class)->nullable();
				$table->string('company')->nullable();
				$table->string('companyName')->nullable();
				$table->string('fiskalId')->nullable();
				$table->string('countryPhone')->nullable();
				$table->string('contactPhone')->nullable();
				$table->string('panId')->nullable();
				$table->string('gstId')->nullable();
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
			Schema::dropIfExists('users');
		}
	};
