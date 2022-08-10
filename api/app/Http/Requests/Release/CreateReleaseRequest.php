<?php
	
	namespace App\Http\Requests\Release;
	
	use App\Http\Requests\APIRequest;
	
	class CreateReleaseRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'remixOrVersion' => 'nullable|string',
				'primaryGenre' => 'nullable|string',
				'secondaryGenre' => 'nullable|string',
				'language' => 'nullable|string',
				'albumFormat' => 'nullable|string',
				'upc' => 'nullable|string',
				'referenceNumber' => 'nullable|string',
				'grId' => 'nullable|string',
				'description' => 'nullable|string',
				'priceCategory' => 'nullable|string',
				'digitalReleaseDate' => 'nullable|string',
				'originalReleaseDate' => 'nullable|string',
				'licenseType' => 'nullable|string',
				'territories' => 'nullable|string',
				'isDistributed' => 'nullable|string',
				'licenseHolderYear' => 'nullable|string',
				'licenseHolderValue' => 'nullable|string',
				'copyrightRecordingYear' => 'nullable|string',
				'copyrightRecordingValue' => 'nullable|string',
			];
		}
	}