<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use App\Models\Store;
use Illuminate\Support\Collection;

/**
 * Class StoreListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class StoreSalesListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($store) {
			/* @var $store Store */
            return [
				'id'                => $store->id,
				'name'          	=> $store->name,
				'logo'     			=> $store->getFirstMediaUrl('logo'),
				'platform'          => $store->platform,
				'duePeriodStart'    => $store->duePeriodStart,
				'duePeriodEnd'      => $store->duePeriodEnd,
				'totalSold'      	=> $store->totalSold(),
            ];
        });
    }
}