<?php

namespace App\Http\Resources\Reports;

use App\Models\Artist;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class ArtistResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class monthlyExpensesResource extends JsonResource
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
			'information' => 	'$this->information',
			'month' => 			'$this->month',
			'year' => 			'$this->year',
			'amountPayable' => 	'$this->amountPayable',
        ];
    }
}
