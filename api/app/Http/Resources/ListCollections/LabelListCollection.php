<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class LabelListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class LabelListCollection extends BaseListCollection
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
                'party_id'     		=> $store->party_id,
                'description'     		=> $store->description,
                'url'     		=> $store->url,
                'soundcloud'     		=> $store->soundcloud,
                'facebook'     		=> $store->facebook,
                'twitter'     		=> $store->twitter,
                'youtube'     		=> $store->youtube,
            ];
        });
    }
}