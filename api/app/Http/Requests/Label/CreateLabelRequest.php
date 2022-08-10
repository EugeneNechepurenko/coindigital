<?php
	
	namespace App\Http\Requests\Label;
	
	use App\Http\Requests\APIRequest;
	
	class CreateLabelRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'party_id' => 'nullable|string',
				'description' => 'nullable|string',
				'url' => 'nullable|string',
				'soundcloud' => 'nullable|string',
				'facebook' => 'nullable|string',
				'twitter' => 'nullable|string',
				'youtube' => 'nullable|string',
			];
		}
	}