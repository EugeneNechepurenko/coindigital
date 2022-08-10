<?php
	
	namespace App\Http\Requests\Image;
	
	use App\Http\Requests\APIRequest;
	
	class CreateImageRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'name' => 'nullable|string',
			];
		}
	}