<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class ImageRepository
 *
 * @package App\Repositories
 *
 */
class ImageRepository extends BaseRepository
{
    /**
     * ImageRepository constructor.
     *
     * @param Image $image
     * @internal param Image $image
     */
    public function __construct(Image $image)
    {
        $this->model = $image;
    }

    /**
     * @param array $data
     *
     * @return Image|false
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
            'images.id',
            'images.name',
        ]);
        return $this->processList($query, $params, $relationships);
    }
}
