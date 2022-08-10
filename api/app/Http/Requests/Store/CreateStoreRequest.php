<?php
	
	namespace App\Http\Requests\Store;
	
	use App\Http\Requests\APIRequest;
	
	class CreateStoreRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'name' => 'required|string',
				'logo' => 'nullable|file',
				'platform_id' => 'nullable|string',
				'duePeriodStart' => 'nullable|string',
				'duePeriodEnd' => 'nullable|string',
			];
		}
	}