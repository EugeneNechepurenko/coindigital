<?php

namespace App\Http\Resources;

use App\Models\Store;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class StoreResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class StoreResource extends JsonResource
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
        /** @var $this Store */
        return [
            'id'                => $this->id,
            'name'          	=> $this->name,
			'logo'     			=> $this->getFirstMediaUrl('logo'),
            'platform'          => $this->platform,
            'duePeriodStart'    => $this->duePeriodStart,
            'duePeriodEnd'      => $this->duePeriodEnd,
        ];
    }
}
