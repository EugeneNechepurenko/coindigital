<?php
	
	namespace App\Http\Requests\Payment;
	
	use App\Http\Requests\APIRequest;
	
	class CreatePaymentRequest extends APIRequest
	{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules()
		{
			return [
				'payment_date' => 'nullable|string',
				'email' => 'nullable|string',
				'account' => 'nullable|string',
				'tds' => 'nullable|string',
				'tax' => 'nullable|string',
				'total_amount' => 'nullable|string',
				'reference' => 'nullable|string',
			];
		}
	}