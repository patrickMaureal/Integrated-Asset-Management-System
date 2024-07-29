<?php

namespace App\Models\Farmer;

use App\Models\BannerPrograms\Corn;
use App\Models\BannerPrograms\Fishery;
use App\Models\BannerPrograms\HighValueCrop;
use App\Models\BannerPrograms\Livestock;
use App\Models\BannerPrograms\OrgAgriculture;
use App\Models\BannerPrograms\Rice;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmer extends Model
{
  use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'name',
		'gender',
		'banner_program',
		'barangay',
		'age',
		'education_level',
	];

	public function CornProgram():HasMany
	{
		return $this->hasMany(Corn::class, 'farmer_name', 'id');
	}

	public function RiceProgram():HasMany
	{
		return $this->hasMany(Rice::class, 'farmer_name', 'id');
	}

	public function HighValueCropsProgram():HasMany
	{
		return $this->hasMany(HighValueCrop::class, 'farmer_name', 'id');
	}

	public function OrgAgricultureProgram():HasMany
	{
		return $this->hasMany(OrgAgriculture::class, 'farmer_name', 'id');
	}

	public function FisheryProgram():HasMany
	{
		return $this->hasMany(Fishery::class, 'fisherman_name', 'id');
	}

	public function LivestockProgram():HasMany
	{
		return $this->hasMany(Livestock::class, 'farmer_name', 'id');
	}
}
