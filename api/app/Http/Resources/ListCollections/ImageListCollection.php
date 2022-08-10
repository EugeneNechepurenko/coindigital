<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class ImageListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class ImageListCollection extends BaseListCollection
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