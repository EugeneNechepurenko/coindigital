<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class ArtistListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class ArtistListCollection extends BaseListCollection
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
                'name'     	=> $store->name,
            ];
        });
    }
}