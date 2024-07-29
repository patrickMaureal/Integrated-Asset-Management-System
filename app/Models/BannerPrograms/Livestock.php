<?php

namespace App\Models\BannerPrograms;

use App\Models\Farmer\Farmer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livestock extends Model
{
  use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'farmer_barangay',
		'farmer_name',
		'livestock_species',
		'livestock_number',
		'age',
		'color',
		'insurance_or_renewal',
	];

	public function farmer():BelongsTo
	{
		return $this->belongsTo(Farmer::class);
	}
}
