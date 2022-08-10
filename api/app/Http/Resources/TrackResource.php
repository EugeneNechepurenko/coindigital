<?php

namespace App\Http\Resources;

use App\Models\Track;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class TrackResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class TrackResource extends JsonResource
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
        /** @var $this Track */
        return [
            'id'                => $this->id,
            'order'          => $this->order,
            'remixOrVersion'          => $this->remixOrVersion,
            'createdBy'          => $this->createdBy,
            'title'          => $this->title,
            'primaryGenre'          => $this->primaryGenre,
            'secondaryGenre'          => $this->secondaryGenre,
            'iswcCode'          => $this->iswcCode,
            'publishingRights'          => $this->publishingRights,
            'language'          => $this->language,
            'isAvaibleSeparately'          => $this->isAvaibleSeparately,
            'startPointTime'          => $this->startPointTime,
            'notes'          => $this->notes,
            'sold'          => $this->sold,
        ];
    }
}
