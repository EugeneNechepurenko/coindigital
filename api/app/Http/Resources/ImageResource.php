<?php

namespace App\Http\Resources;

use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class ImageResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class ImageResource extends JsonResource
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
        /** @var $this Image */
        return [
            'id'                => $this->id,
            'name'          => $this->name,
        ];
    }
}
