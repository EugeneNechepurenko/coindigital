<?php
	
	namespace App\Http\Requests\User;
	
	use App\Http\Requests\APIRequest;
	
	class CreateUserRequest extends APIRequest
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