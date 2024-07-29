<?php

namespace App\Models\BannerPrograms;

use App\Models\Farmer\Farmer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fishery extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'fisherman_name',
		'fisherman_barangay',
		'fishing_activities',
		'aquaculture_details',
		'form_of_fishing',
		'insurance_or_renewal'
	];

	public function farmer():BelongsTo
	{
		return $this->belongsTo(Farmer::class);
	}
}
