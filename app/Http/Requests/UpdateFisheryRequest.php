<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFisheryRequest extends FormRequest
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
			'fisherman_barangay' => ['required', 'string'],
			'fishing_activities' => ['required', 'string', 'max:255'],
			'aquaculture_details' => ['required', 'string', 'max:255'],
			'form_of_fishing' => ['required', 'string'],
			'insurance_or_renewal' => ['required', 'string'],
		];
	}
}
