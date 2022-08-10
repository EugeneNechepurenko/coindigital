<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Artist\CreateArtistRequest;
use App\Http\Resources\ListCollections\ArtistListCollection;
use App\Http\Resources\ArtistResource;
use App\Repositories\ArtistRepository;
use App\Services\ArtistService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ArtistController extends Controller
{
	/** @var ArtistService */
	private $artistService;
	/** @var ArtistRepository */
	private $artistRepository;
	
	public function __construct(
		ArtistService $artistService,
		ArtistRepository $artistRepository
	) {
		$this->artistService = $artistService;
		$this->artistRepository = $artistRepository;
	}
	
	
	#[OA\Get(
		path: '/api/artists',
		tags: ['Artist'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Artist'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$artists = $this->artistRepository->list($request->all());
		return response(new ArtistListCollection($artists));
	}
	
	#[OA\Post(
		path: '/api/artists/create',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'name' => new OA\Property(property: 'name', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Artist'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Artist',
			))
		]
	)]
	public function create(CreateArtistRequest $request)
	{
		$artist = $this->artistService->create($request->validated());
		return response($artist);
	}
	
	#[OA\Get(
		path: '/api/artists/{id}',
		tags: ['Artist'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Artist',
			))
		]
	)]
	public function get($id)
	{
		$artist = $this->artistRepository->find($id);
		return response(new ArtistResource($artist));
	}
	
	#[OA\Post(
		path: '/api/artists/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'name' => new OA\Property(property: 'name', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Artist'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Artist',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$artist = $this->artistRepository->find($id);
		$this->artistService->update($artist, $request->all());
		$artist = $this->artistRepository->find($id);
		return response(new ArtistResource($artist));
	}
	
	
	#[OA\Get(
		path: '/api/artists/{id}/delete',
		tags: ['Artist'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$artist = $this->artistRepository->find($id);
		$this->artistRepository->deleteModel($artist);
		return response('',200);
	}
}
