<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Release\CreateReleaseRequest;
use App\Http\Resources\ListCollections\ReleaseListCollection;
use App\Http\Resources\ReleaseResource;
use App\Repositories\ReleaseRepository;
use App\Services\ReleaseService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ReleaseController extends Controller
{
	/** @var ReleaseService */
	private $releaseService;
	/** @var ReleaseRepository */
	private $releaseRepository;
	
	public function __construct(
		ReleaseService $releaseService,
		ReleaseRepository $releaseRepository
	) {
		$this->releaseService = $releaseService;
		$this->releaseRepository = $releaseRepository;
	}
	
	
	#[OA\Get(
		path: '/api/releases',
		tags: ['Release'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Release'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$releases = $this->releaseRepository->list($request->all());
		return response(new ReleaseListCollection($releases));
	}
	
	#[OA\Post(
		path: '/api/releases/create',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
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
						]
					)
				)
			]
		),
		tags: ['Release'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Release',
			))
		]
	)]
	public function create(Request $request)
	{
		$release = $this->releaseService->create($request->all());
		return response(new ReleaseResource($release));
	}
	
	#[OA\Get(
		path: '/api/releases/{id}',
		tags: ['Release'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Release',
			))
		]
	)]
	public function get($id)
	{
		$release = $this->releaseRepository->find($id);
		return response(new ReleaseResource($release));
	}
	
	#[OA\Post(
		path: '/api/releases/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
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
						]
					)
				)
			]
		),
		tags: ['Release'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Release',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$release = $this->releaseRepository->find($id);
		$this->releaseService->update($release, $request->all());
		$release = $this->releaseRepository->find($id);
		return response(new ReleaseResource($release));
	}
	
	
	#[OA\Get(
		path: '/api/releases/{id}/delete',
		tags: ['Release'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$release = $this->releaseRepository->find($id);
		$this->releaseRepository->deleteModel($release);
		return response('',200);
	}
}
