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
		Schema::create('rice', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('farmer_barangay');
			$table->foreignUuid('farmer_name')->references('id')->on('farmers')->onDelete('cascade');
			$table->string('farm_details');
			$table->string('rice_type');
			$table->bigInteger('hectares_field');
			$table->string('organic_type');
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
		Schema::dropIfExists('rice');
	}
};
