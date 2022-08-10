<?php

namespace App\Repositories;

use App\Models\Label;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class LabelRepository
 *
 * @package App\Repositories
 *
 */
class LabelRepository extends BaseRepository
{
    /**
     * LabelRepository constructor.
     *
     * @param Label $label
     * @internal param Label $label
     */
    public function __construct(Label $label)
    {
        $this->model = $label;
    }

    /**
     * @param array $data
     *
     * @return Label|false
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
            'labels.id',
            'labels.name',
        ]);
		$relationships[] = 'artists';
        return $this->processList($query, $params, $relationships);
    }
}
