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
			Schema::table('users', function (Blueprint $table) {
				$table->foreignIdFor(\App\Models\UserAccount::class)->nullable();
				$table->foreignIdFor(\App\Models\UserBank::class)->nullable();
				$table->foreignIdFor(\App\Models\UserCompany::class)->nullable();
				$table->foreignIdFor(\App\Models\UserMeta::class)->nullable();
				$table->foreignIdFor(\App\Models\UserPayout::class)->nullable();
				$table->foreignIdFor(\App\Models\UserPersonal::class)->nullable();
				$table->foreignIdFor(\App\Models\UserTds::class)->nullable();
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
