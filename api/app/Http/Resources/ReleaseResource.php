<?php

namespace App\Http\Resources;

use App\Models\Release;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class ReleaseResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class ReleaseResource extends JsonResource
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
        /** @var $this Release */
        return [
            'id'                => $this->id,
            'remixOrVersion'          => $this->remixOrVersion,
            'primaryGenre'          => $this->primaryGenre,
            'secondaryGenre'          => $this->secondaryGenre,
            'language'          => $this->language,
            'albumFormat'          => $this->albumFormat,
            'upc'          => $this->upc,
            'referenceNumber'          => $this->referenceNumber,
            'grId'          => $this->grId,
            'description'          => $this->description,
            'priceCategory'          => $this->priceCategory,
            'digitalReleaseDate'          => $this->digitalReleaseDate,
            'originalReleaseDate'          => $this->originalReleaseDate,
            'licenseType'          => $this->licenseType,
            'territories'          => $this->territories,
            'isDistributed'          => $this->isDistributed,
            'licenseHolderYear'          => $this->licenseHolderYear,
            'licenseHolderValue'          => $this->licenseHolderValue,
            'copyrightRecordingYear'          => $this->copyrightRecordingYear,
            'copyrightRecordingValue'          => $this->copyrightRecordingValue,
            'tracks'          => $this->tracks,
            'artists'          => $this->artists,
            'label'          => $this->label,
        ];
    }
}
