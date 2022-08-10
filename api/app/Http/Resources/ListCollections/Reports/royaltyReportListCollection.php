<?php

namespace App\Http\Resources\ListCollections\Reports;

use App\Http\Resources\BaseListCollection;
use App\Models\Platform;
use Illuminate\Support\Collection;

/**
 * Class ArtistListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class royaltyReportListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($data) {
			/* @var $data Platform */
            return [
                'platform'	=> $data->name,
                'month'		=> '',
                'year'		=> '',
                'detail'	=> '',
                'summary'	=> '',
            ];
        });
    }
}