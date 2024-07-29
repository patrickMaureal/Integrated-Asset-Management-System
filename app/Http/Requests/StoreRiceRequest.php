<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'farmer_name' => ['required', 'string'],
			'farmer_barangay' => ['required', 'string'],
			'farm_details' => ['required', 'string', 'max:255'],
			'rice_type' => ['required', 'string'],
			'hectares_field' => ['required', 'numeric'],
			'organic_type' => ['required', 'string'],
			'insurance_or_renewal' => ['required', 'string'],
		];
	}
}
