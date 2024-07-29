<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('fisheries', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('fisherman_barangay');
			$table->foreignUuid('fisherman_name')->references('id')->on('farmers')->onDelete('cascade');
			$table->string('fishing_activities');
			$table->string('aquaculture_details');
			$table->string('form_of_fishing');
			$table->string('insurance_or_renewal');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('fisheries');
	}
};
