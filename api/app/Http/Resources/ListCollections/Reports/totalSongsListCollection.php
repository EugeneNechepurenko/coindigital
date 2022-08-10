<?php

namespace App\Http\Resources\ListCollections\Reports;

use App\Http\Resources\BaseListCollection;
use App\Models\Track;
use Illuminate\Support\Collection;

/**
 * Class ArtistListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class totalSongsListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($data) {
			/* @var $data Track */
			dd($data->release());
            return [
                'release'	=> $data->release()->getResults()->label()->name,
                'track'		=> $data->id,
                'upc'		=> '',
                'label'		=> $data->title,
                'artist'	=> '',
                'gross'		=> '',
                'net'		=> '',
            ];
        });
    }
}