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
		Schema::create('high_value_crops', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('farmer_barangay');
			$table->foreignUuid('farmer_name')->references('id')->on('farmers')->onDelete('cascade');
			$table->string('crop_information');
			$table->string('crop_type');
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
		Schema::dropIfExists('high_value_crops');
	}
};
