<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;



#[OA\Schema(
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'order' => new OA\Property(property: 'order', type: 'string'),
		'remixOrVersion' => new OA\Property(property: 'remixOrVersion', type: 'string'),
		'createdBy' => new OA\Property(property: 'createdBy', type: 'string'),
		'title' => new OA\Property(property: 'title', type: 'string'),
		'primaryGenre' => new OA\Property(property: 'primaryGenre', type: 'string'),
		'secondaryGenre' => new OA\Property(property: 'secondaryGenre', type: 'string'),
		'iswcCode' => new OA\Property(property: 'iswcCode', type: 'string'),
		'publishingRights' => new OA\Property(property: 'publishingRights', type: 'string'),
		'language' => new OA\Property(property: 'language', type: 'string'),
		'isAvaibleSeparately' => new OA\Property(property: 'isAvaibleSeparately', type: 'string'),
		'startPointTime' => new OA\Property(property: 'startPointTime', type: 'string'),
		'notes' => new OA\Property(property: 'notes', type: 'string'),
		'sold' => new OA\Property(property: 'sold', type: 'string'),
		'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
		'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
	]
)]
/**
 * @property int         $id
 * @property string      $order
 * @property string      $remixOrVersion
 * @property string      $createdBy
 * @property string      $title
 * @property string      $primaryGenre
 * @property string      $secondaryGenre
 * @property string      $iswcCode
 * @property string      $publishingRights
 * @property string      $language
 * @property string      $isAvaibleSeparately
 * @property string      $startPointTime
 * @property string      $notes
 * @property integer     $sold
 * @property Release     $release
 * @property Store       $stores
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Track extends Model
{
  use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'order',
        'remixOrVersion',
        'createdBy',
        'title',
        'primaryGenre',
        'secondaryGenre',
        'iswcCode',
        'publishingRights',
        'language',
        'isAvaibleSeparately',
        'startPointTime',
        'notes',
        'sold',
    ];


	public function stores(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Store::class);
	}
	public function release(): BelongsTo
	{
		return $this->belongsTo(Release::class);
	}
}
