<?php

namespace App\Repositories;

use App\Models\Platform;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class PlatformRepository
 *
 * @package App\Repositories
 *
 */
class PlatformRepository extends BaseRepository
{
    /**
     * PlatformRepository constructor.
     *
     * @param Platform $platform
     * @internal param Platform $platform
     */
    public function __construct(Platform $platform)
    {
        $this->model = $platform;
    }

    /**
     * @param array $data
     *
     * @return Platform|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->name ??= $data['name'] ?? null;

        try {
            $model->save();
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
            'platforms.id',
            'platforms.name',
        ]);
		$relationships[] = 'stores';
        return $this->processList($query, $params, $relationships);
    }
}
