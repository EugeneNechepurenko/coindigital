<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OpenApi\Attributes as OA;



#[OA\Schema(
	properties: [
		'id' => new OA\Property(property: 'id', type: 'int'),
		'remixOrVersion' => new OA\Property(property: 'remixOrVersion', type: 'string'),
		'primaryGenre' => new OA\Property(property: 'primaryGenre', type: 'string'),
		'secondaryGenre' => new OA\Property(property: 'secondaryGenre', type: 'string'),
		'language' => new OA\Property(property: 'language', type: 'string'),
		'albumFormat' => new OA\Property(property: 'albumFormat', type: 'string'),
		'upc' => new OA\Property(property: 'upc', type: 'string'),
		'referenceNumber' => new OA\Property(property: 'referenceNumber', type: 'string'),
		'grId' => new OA\Property(property: 'grId', type: 'string'),
		'description' => new OA\Property(property: 'description', type: 'string'),
		'priceCategory' => new OA\Property(property: 'priceCategory', type: 'string'),
		'digitalReleaseDate' => new OA\Property(property: 'digitalReleaseDate', type: 'string'),
		'originalReleaseDate' => new OA\Property(property: 'originalReleaseDate', type: 'string'),
		'licenseType' => new OA\Property(property: 'licenseType', type: 'string'),
		'territories' => new OA\Property(property: 'territories', type: 'string'),
		'isDistributed' => new OA\Property(property: 'isDistributed', type: 'string'),
		'licenseHolderYear' => new OA\Property(property: 'licenseHolderYear', type: 'string'),
		'licenseHolderValue' => new OA\Property(property: 'licenseHolderValue', type: 'string'),
		'copyrightRecordingYear' => new OA\Property(property: 'copyrightRecordingYear', type: 'string'),
		'copyrightRecordingValue' => new OA\Property(property: 'copyrightRecordingValue', type: 'string'),
		'created_at' => new OA\Property(property: 'created_at', type: 'Carbon'),
		'updated_at' => new OA\Property(property: 'updated_at', type: 'Carbon'),
	]
)]
/**
 * @property int         $id
 * @property string      $remixOrVersion
 * @property string      $primaryGenre
 * @property string      $secondaryGenre
 * @property string      $language
 * @property string      $albumFormat
 * @property string      $upc
 * @property string      $referenceNumber
 * @property string      $grId
 * @property string      $description
 * @property string      $priceCategory
 * @property string      $digitalReleaseDate
 * @property string      $originalReleaseDate
 * @property string      $licenseType
 * @property string      $territories
 * @property string      $isDistributed
 * @property string      $licenseHolderYear
 * @property string      $licenseHolderValue
 * @property string      $copyrightRecordingYear
 * @property string      $copyrightRecordingValue
 * @property Label       $label
 * @property Artist      $artists
 * @property Track       $tracks
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Release extends Model
{
  use HasFactory;
    /**
     * @var array
     */
    protected $fillable = [
        'remixOrVersion',
        'primaryGenre',
        'secondaryGenre',
        'language',
        'albumFormat',
        'upc',
        'referenceNumber',
        'grId',
        'description',
        'priceCategory',
        'digitalReleaseDate',
        'originalReleaseDate',
        'licenseType',
        'territories',
        'isDistributed',
        'licenseHolderYear',
        'licenseHolderValue',
        'copyrightRecordingYear',
        'copyrightRecordingValue',
    ];


	public function tracks(): HasMany
	{
		return $this->hasMany(Track::class);
	}
	public function artists()
	{
		return $this->hasMany(Artist::class);
	}
	public function label()
	{
		return $this->belongsToMany(Label::class);
	}
}
