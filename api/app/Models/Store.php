<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Attributes as OA;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[OA\Schema(
	schema:"Store",
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'name' => new OA\Property(property: 'name', type: 'string'),
		'logo' => new OA\Property(property: 'logo', type: 'string'),
		'platform' => new OA\Property(property: 'platform', type: 'string'),
		'duePeriodStart' => new OA\Property(property: 'duePeriodStart', type: 'string'),
		'duePeriodEnd' => new OA\Property(property: 'duePeriodEnd', type: 'string'),
		'totalSold' => new OA\Property(property: 'totalSold', type: 'string'),
		'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
		'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
	]
)]
/**
 * @property int         $id
 * @property string      $name
 * @property string      $logo
 * @property string      $platform_id
 * @property string      $duePeriodStart
 * @property string      $duePeriodEnd
 * @property string      $totalSold
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Store extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia;
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
        'platform_id',
        'duePeriodStart',
        'duePeriodEnd',
    ];
	
	public function tracks()
	{
		return $this->belongsToMany(Track::class);
	}
	
	public function platform()
	{
		return $this->belongsTo(Platform::class);
	}
	public function totalSold()
	{
		$tracks = $this->tracks()->getResults();
		/* @var $track Track */
		$sold = 0;
		foreach ($tracks as $track){
			$sold += $track->sold;
		}
		return $sold;
	}
}
