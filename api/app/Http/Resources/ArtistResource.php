<?php

namespace App\Http\Resources;

use App\Models\Artist;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class ArtistResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class ArtistResource extends JsonResource
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
        /** @var $this Artist */
        return [
            'id'                => $this->id,
            'name'          => $this->name,
        ];
    }
}
