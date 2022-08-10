<?php

namespace App\Repositories;

use App\Models\Track;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class TrackRepository
 *
 * @package App\Repositories
 *
 */
class TrackRepository extends BaseRepository
{
    /**
     * TrackRepository constructor.
     *
     * @param Track $track
     * @internal param Track $track
     */
    public function __construct(Track $track)
    {
        $this->model = $track;
    }

    /**
     * @param array $data
     *
     * @return Track|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->order ??= $data['order'] ?? null;
        $model->remixOrVersion ??= $data['remixOrVersion'] ?? null;
        $model->createdBy ??= $data['createdBy'] ?? null;
        $model->title ??= $data['title'] ?? null;
        $model->primaryGenre ??= $data['primaryGenre'] ?? null;
        $model->secondaryGenre ??= $data['secondaryGenre'] ?? null;
        $model->iswcCode ??= $data['iswcCode'] ?? null;
        $model->publishingRights ??= $data['publishingRights'] ?? null;
        $model->language ??= $data['language'] ?? null;
        $model->isAvaibleSeparately ??= $data['isAvaibleSeparately'] ?? null;
        $model->startPointTime ??= $data['startPointTime'] ?? null;
        $model->notes ??= $data['notes'] ?? null;
        $model->sold ??= $data['sold'] ?? null;
        $model->release_id ??= $data['release_id'] ?? null;

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
            'tracks.id',
            'tracks.order',
            'tracks.remixOrVersion',
            'tracks.createdBy',
            'tracks.title',
            'tracks.primaryGenre',
            'tracks.secondaryGenre',
            'tracks.iswcCode',
            'tracks.publishingRights',
            'tracks.language',
            'tracks.isAvaibleSeparately',
            'tracks.startPointTime',
            'tracks.notes',
            'tracks.sold',
        ]);
		$relationships[] = 'release';
        return $this->processList($query, $params, $relationships);
    }
}
