<?php

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/**
 * Class StoreRepository
 *
 * @package App\Repositories
 *
 */
class StoreRepository extends BaseRepository
{
    /**
     * StoreRepository constructor.
     *
     * @param Store $store
     * @internal param Store $store
     */
    public function __construct(Store $store)
    {
        $this->model = $store;
    }

    /**
     * @param array $data
     *
     * @return Store|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->name ??= $data['name'] ?? null;
        $model->platform_id = $data['platform_id'] ?? null;
        $model->duePeriodStart = $data['duePeriodStart'] ?? null;
        $model->duePeriodEnd =   $data['duePeriodEnd'] ?? null;

        try {
            $model->save();
	
			if($data['logo']) {
				$model->addMedia($data['logo'])->toMediaCollection('logo');
				$model->save();
			}
        } catch (QueryException $e) {
			throw new \Exception($e->getMessage());
        }
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function list(array $params = [], array $relationships = []): LengthAwarePaginator
    {
        $query = $this->newQuery();
        $query->select([
            'stores.id',
            'stores.name',
            'stores.logo',
            'stores.duePeriodStart',
            'stores.duePeriodEnd',
        ]);
		$relationships[] = 'tracks';
        return $this->processList($query, $params, $relationships);
    }
}
