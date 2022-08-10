<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class TrackListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class TrackSalesListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($track) {
            return [
                'id'        	=> $track->id,
                'title'     	=> $track->title,
                'sold'     	=> $track->sold,
//				'gross'=>$gross,
//				'net'=>$net,
            ];
        });
    }
}