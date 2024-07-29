<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivestockRequest extends FormRequest
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
			'livestock_species' => ['required', 'string'],
			'livestock_number' => ['required', 'numeric'],
			'age' => ['required', 'numeric'],
			'color' => ['required', 'string'],
			'insurance_or_renewal' => ['required', 'string'],
		];
	}
}
