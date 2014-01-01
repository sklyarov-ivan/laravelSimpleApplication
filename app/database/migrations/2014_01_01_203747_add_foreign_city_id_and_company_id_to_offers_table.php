<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignCityIdAndCompanyIdToOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('offers', function(Blueprint $table) {
			$table->index('city_id');
			$table->index('company_id');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offers', function(Blueprint $table) {
			
		});
	}

}
