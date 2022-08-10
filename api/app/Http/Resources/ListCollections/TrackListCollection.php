<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use App\Models\Track;
use Illuminate\Support\Collection;

/**
 * Class TrackListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class TrackListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($track) {
	
			/** @var $track Track */
            return [
                'id'        	=> $track->id,
                'order'     	=> $track->order,
                'remixOrVersion'     	=> $track->remixOrVersion,
                'createdBy'     	=> $track->createdBy,
                'title'     	=> $track->title,
                'primaryGenre'     	=> $track->primaryGenre,
                'secondaryGenre'     	=> $track->secondaryGenre,
                'iswcCode'     	=> $track->iswcCode,
                'publishingRights'     	=> $track->publishingRights,
                'language'     	=> $track->language,
                'isAvaibleSeparately'     	=> $track->isAvaibleSeparately,
                'startPointTime'     	=> $track->startPointTime,
                'notes'     	=> $track->notes,
                'sold'     	=> $track->sold,
                'release'     	=> $track->release,
            ];
        });
    }
}