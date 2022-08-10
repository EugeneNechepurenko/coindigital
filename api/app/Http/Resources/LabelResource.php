<?php

namespace App\Http\Resources;

use App\Models\Label;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class LabelResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class LabelResource extends JsonResource
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
        /** @var $this Label */
        return [
            'id'                => $this->id,
            'party_id'          	=> $this->party_id,
            'description'          	=> $this->description,
            'url'          	=> $this->url,
            'soundcloud'          	=> $this->soundcloud,
            'facebook'          	=> $this->facebook,
            'twitter'          	=> $this->twitter,
            'youtube'          	=> $this->youtube,
        ];
    }
}
