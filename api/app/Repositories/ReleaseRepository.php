<?php

namespace App\Repositories;

use App\Models\Artist;
use App\Models\Label;
use App\Models\Release;
use App\Models\Track;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\QueryException;

/**
 * Class ReleaseRepository
 *
 * @package App\Repositories
 *
 */
class ReleaseRepository extends BaseRepository
{
    /**
     * ReleaseRepository constructor.
     *
     * @param Release $release
     * @internal param Release $release
     */
    public function __construct(Release $release)
    {
        $this->model = $release;
    }

    /**
     * @param array $data
     *
     * @return Release|false
     */
    public function create(array $data)
    {
        $model = $this->model->newInstance();
        $model->remixOrVersion ??= $data['remixOrVersion'] ?? null;
        $model->primaryGenre ??= $data['primaryGenre'] ?? null;
        $model->secondaryGenre ??= $data['secondaryGenre'] ?? null;
        $model->language ??= $data['language'] ?? null;
        $model->albumFormat ??= $data['albumFormat'] ?? null;
        $model->upc ??= $data['upc'] ?? null;
        $model->referenceNumber ??= $data['referenceNumber'] ?? null;
        $model->grId ??= $data['grId'] ?? null;
        $model->description ??= $data['description'] ?? null;
        $model->priceCategory ??= $data['priceCategory'] ?? null;
        $model->digitalReleaseDate ??= $data['digitalReleaseDate'] ?? null;
        $model->originalReleaseDate ??= $data['originalReleaseDate'] ?? null;
        $model->licenseType ??= $data['licenseType'] ?? null;
        $model->territories ??= $data['territories'] ?? null;
        $model->isDistributed ??= $data['isDistributed'] ?? null;
        $model->licenseHolderYear ??= $data['licenseHolderYear'] ?? null;
        $model->licenseHolderValue ??= $data['licenseHolderValue'] ?? null;
        $model->copyrightRecordingYear ??= $data['copyrightRecordingYear'] ?? null;
        $model->copyrightRecordingValue ??= $data['copyrightRecordingValue'] ?? null;

        try {
            $model->save();
			if(isset($data['label'])){
				try {
					$model->label()->save(new Label($data['label']));
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
	
			if(isset($data['tracks'])){
				for($i=0;$i< sizeof($data['tracks']);$i++){
					try {
						$model->tracks()->save(new Track($data['tracks'][$i]));
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			if(isset($data['artists'])){
				for($i=0;$i< sizeof($data['artists']);$i++){
					try {
						$model->artists()->save(new Artist($data['artists'][$i]));
					} catch (QueryException $e) {
						throw new \Exception($e->getMessage());
					}
				}
			}
			
        } catch (QueryException $e) {
			throw new \Exception($e->getMessage());
        }
        return $model;
    }
	
	public function update($id, array $data)
	{
		/* @var $model Release */
		$model = $this->find($id);
		$model->remixOrVersion = isset($data['remixOrVersion']) ? $data['remixOrVersion'] : $model->name;
		$model->primaryGenre = isset($data['primaryGenre']) ? $data['primaryGenre'] : $model->name;
		$model->secondaryGenre = isset($data['secondaryGenre']) ? $data['secondaryGenre'] : $model->name;
		$model->language = isset($data['language']) ? $data['language'] : $model->name;
		$model->albumFormat = isset($data['albumFormat']) ? $data['albumFormat'] : $model->name;
		$model->upc = isset($data['upc']) ? $data['upc'] : $model->name;
		$model->referenceNumber = isset($data['referenceNumber']) ? $data['referenceNumber'] : $model->name;
		$model->grId = isset($data['grId']) ? $data['grId'] : $model->name;
		$model->description = isset($data['description']) ? $data['description'] : $model->name;
		$model->priceCategory = isset($data['priceCategory']) ? $data['priceCategory'] : $model->name;
		$model->digitalReleaseDate = isset($data['digitalReleaseDate']) ? $data['digitalReleaseDate'] : $model->name;
		$model->originalReleaseDate = isset($data['originalReleaseDate']) ? $data['originalReleaseDate'] : $model->name;
		$model->licenseType = isset($data['licenseType']) ? $data['licenseType'] : $model->name;
		$model->territories = isset($data['territories']) ? $data['territories'] : $model->name;
		$model->isDistributed = isset($data['isDistributed']) ? $data['isDistributed'] : $model->name;
		$model->licenseHolderYear = isset($data['licenseHolderYear']) ? $data['licenseHolderYear'] : $model->name;
		$model->licenseHolderValue = isset($data['licenseHolderValue']) ? $data['licenseHolderValue'] : $model->name;
		$model->copyrightRecordingYear = isset($data['copyrightRecordingYear']) ? $data['copyrightRecordingYear'] : $model->name;
		$model->copyrightRecordingValue = isset($data['copyrightRecordingValue']) ? $data['copyrightRecordingValue'] : $model->name;
		
		$model->update($data);
		if(isset($data['tracks']) && is_array($data['tracks'])){
			for($i=0;$i< sizeof($data['tracks']);$i++){
				try {
					$model->tracks()->update($data['tracks'][$i]);
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
		}
		if(isset($data['artists']) && is_array($data['artists'])){
			for($i=0;$i< sizeof($data['artists']);$i++){
				try {
					$model->artists()->update($data['artists'][$i]);
				} catch (QueryException $e) {
					throw new \Exception($e->getMessage());
				}
			}
		}
		if(isset($data['label'])){
			try {
				$rel_model = $this->findBy('release_id',$model->id);
				if($rel_model) {
					$rel_model->update($data['label']);
				}
			} catch (QueryException $e) {
				throw new \Exception($e->getMessage());
			}
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
            'releases.id',
            'releases.remixOrVersion',
            'releases.primaryGenre',
            'releases.secondaryGenre',
            'releases.language',
            'releases.albumFormat',
            'releases.upc',
            'releases.referenceNumber',
            'releases.grId',
            'releases.description',
            'releases.priceCategory',
            'releases.digitalReleaseDate',
            'releases.originalReleaseDate',
            'releases.licenseType',
            'releases.territories',
            'releases.isDistributed',
            'releases.licenseHolderYear',
            'releases.licenseHolderValue',
            'releases.copyrightRecordingYear',
            'releases.copyrightRecordingValue',
        ]);
		$relationships[] = 'tracks';
		$relationships[] = 'artists';
		$relationships[] = 'label';
        return $this->processList($query, $params, $relationships);
    }
}
