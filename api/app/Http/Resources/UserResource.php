<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class UserResource
 *
 * @package App\Http\Resources
 * @mixin Collection
 */
class UserResource extends JsonResource
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
        /** @var $this User */
        return [
			'id'        => $this->id,
			'name'      => $this->name,
			'email'     => $this->email,
			'account'   => $this->account,
			'bank'   	=> $this->bank,
			'company'   => $this->company,
			'meta'   	=> $this->meta,
			'payout'    => $this->payout,
			'personal'  => $this->personal,
			'tds'   	=> $this->tds,
        ];
    }
}
