<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Track\CreateTrackRequest;
use App\Http\Resources\ListCollections\TrackListCollection;
use App\Http\Resources\TrackResource;
use App\Repositories\TrackRepository;
use App\Services\TrackService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class TrackController extends Controller
{
	/** @var TrackService */
	private $trackService;
	/** @var TrackRepository */
	private $trackRepository;
	
	public function __construct(
		TrackService $trackService,
		TrackRepository $trackRepository
	) {
		$this->trackService = $trackService;
		$this->trackRepository = $trackRepository;
	}
	
	
	#[OA\Get(
		path: '/api/tracks',
		tags: ['Track'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Track'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$tracks = $this->trackRepository->list($request->all());
		return response(new TrackListCollection($tracks));
	}
	
	#[OA\Post(
		path: '/api/tracks/create',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
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
						]
					)
				)
			]
		),
		tags: ['Track'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Track',
			))
		]
	)]
	public function create(CreateTrackRequest $request)
	{
		$track = $this->trackService->create($request->validated());
		return response($track);
	}
	
	#[OA\Get(
		path: '/api/tracks/{id}',
		tags: ['Track'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Track',
			))
		]
	)]
	public function get($id)
	{
		$track = $this->trackRepository->find($id);
		return response(new TrackResource($track));
	}
	
	#[OA\Post(
		path: '/api/tracks/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
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
						]
					)
				)
			]
		),
		tags: ['Track'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Track',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$track = $this->trackRepository->find($id);
		$this->trackService->update($track, $request->all());
		$track = $this->trackRepository->find($id);
		return response(new TrackResource($track));
	}
	
	
	#[OA\Get(
		path: '/api/tracks/{id}/delete',
		tags: ['Track'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$track = $this->trackRepository->find($id);
		$this->trackRepository->deleteModel($track);
		return response('',200);
	}
}
