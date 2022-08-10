<?php

namespace App\Repositories;

use App\Models\Artist;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class ArtistRepository
 *
 * @package App\Repositories
 *
 */
class ArtistRepository extends BaseRepository
{
    /**
     * ArtistRepository constructor.
     *
     * @param Artist $artist
     * @internal param Artist $artist
     */
    public function __construct(Artist $artist)
    {
        $this->model = $artist;
    }

    /**
     * @param array $data
     *
     * @return Artist|false
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
            'artists.id',
            'artists.name',
        ]);
        return $this->processList($query, $params, $relationships);
    }
}
