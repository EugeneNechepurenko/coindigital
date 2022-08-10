<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use Illuminate\Support\Collection;

/**
 * Class ReleaseListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class ReleaseListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($release) {
            return [
                'id'        	=> $release->id,
                'remixOrVersion'     	=> $release->remixOrVersion,
                'primaryGenre'     	=> $release->primaryGenre,
                'secondaryGenre'     	=> $release->secondaryGenre,
                'language'     	=> $release->language,
                'albumFormat'     	=> $release->albumFormat,
                'upc'     	=> $release->upc,
                'referenceNumber'     	=> $release->referenceNumber,
                'grId'     	=> $release->grId,
                'description'     	=> $release->description,
                'priceCategory'     	=> $release->priceCategory,
                'digitalReleaseDate'     	=> $release->digitalReleaseDate,
                'originalReleaseDate'     	=> $release->originalReleaseDate,
                'licenseType'     	=> $release->licenseType,
                'territories'     	=> $release->territories,
                'isDistributed'     	=> $release->isDistributed,
                'licenseHolderYear'     	=> $release->licenseHolderYear,
                'licenseHolderValue'     	=> $release->licenseHolderValue,
                'copyrightRecordingYear'     	=> $release->copyrightRecordingYear,
                'copyrightRecordingValue'     	=> $release->copyrightRecordingValue,
				'tracks'          => $release->tracks,
				'artists'          => $release->artists,
				'label'          => $release->label,
            ];
        });
    }
}