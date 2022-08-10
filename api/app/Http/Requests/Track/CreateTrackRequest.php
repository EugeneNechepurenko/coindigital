<?php
	
	namespace App\Http\Requests\Track;
	
	use App\Http\Requests\APIRequest;
	
	class CreateTrackRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'order' => 'nullable|string',
				'remixOrVersion' => 'nullable|string',
				'createdBy' => 'nullable|string',
				'title' => 'nullable|string',
				'primaryGenre' => 'nullable|string',
				'secondaryGenre' => 'nullable|string',
				'iswcCode' => 'nullable|string',
				'publishingRights' => 'nullable|string',
				'language' => 'nullable|string',
				'isAvaibleSeparately' => 'nullable|string',
				'startPointTime' => 'nullable|string',
				'notes' => 'nullable|string',
				'sold' => 'nullable|integer',
				'release_id' => 'nullable|integer',
			];
		}
	}