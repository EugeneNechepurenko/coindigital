<?php

namespace App\Http\Resources\ListCollections;

use App\Http\Resources\BaseListCollection;
use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class UserListCollection
 *
 * @package App\Http\Resources\ListCollections
 */
class UserListCollection extends BaseListCollection
{
    /**
     * Specifies data item in response
     *
     * @return Collection
     */
    protected function data(): Collection
    {
        return $this->collection->transform(function ($user) {
			/** @var $user User */
            return [
                'id'        => $user->id,
				'name'      => $user->name,
				'email'     => $user->email,
				'account'   => $user->account,
				'bank'   	=> $user->bank,
				'company'   => $user->company,
				'meta'   	=> $user->meta,
				'payout'    => $user->payout,
				'personal'  => $user->personal,
				'tds'   	=> $user->tds,
            ];
        });
    }
}