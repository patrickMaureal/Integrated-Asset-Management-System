<?php

namespace App\Models\BannerPrograms;

use App\Models\Farmer\Farmer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrgAgriculture extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'farmer_barangay',
		'corn_id',
		'rice_id',
		'farmer_name',
		'organic_type'
	];

	public function farmer():BelongsTo
	{
		return $this->belongsTo(Farmer::class);
	}

}
