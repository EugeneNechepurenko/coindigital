<?php

namespace App\Http\Resources;

use App\Models\Payment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class PaymentResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var $this Payment */
        return [
            'id'                => $this->id,
            'payment_date'          => $this->payment_date,
            'email'          => $this->email,
            'account'          => $this->account,
            'tds'          => $this->tds,
            'tax'          => $this->tax,
            'total_amount'          => $this->total_amount,
            'reference'          => $this->reference,
        ];
    }
}
