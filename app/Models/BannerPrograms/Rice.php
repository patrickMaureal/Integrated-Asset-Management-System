<?php

namespace App\Models\BannerPrograms;

use App\Models\Farmer\Farmer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rice extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'farmer_name',
		'farmer_barangay',
		'farm_details',
		'rice_type',
		'hectares_field',
		'organic_type',
		'insurance_or_renewal',
	];

	public function farmer(): BelongsTo
	{
		return $this->belongsTo(Farmer::class);
	}
}
