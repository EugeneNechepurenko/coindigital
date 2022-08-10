<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class PaymentListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class PaymentListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($store) {
            return [
                'id'        	=> $store->id,
                'payment_date'     	=> $store->payment_date,
                'email'     	=> $store->email,
                'account'     	=> $store->account,
                'tds'     	=> $store->tds,
                'tax'     	=> $store->tax,
                'total_amount'     	=> $store->total_amount,
                'reference'     	=> $store->reference,
            ];
        });
    }
}