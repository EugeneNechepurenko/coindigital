<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Resources\ListCollections\StoreListCollection;
use App\Http\Resources\StoreResource;
use App\Repositories\StoreRepository;
use App\Services\StoreService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;
use \Illuminate\Http\Response;
use \Illuminate\Contracts\Routing\ResponseFactory;


class StoreController extends Controller
{
	/** @var StoreService */
	private $storeService;
	/** @var StoreRepository */
	private $storeRepository;
	
	public function __construct(
		StoreService $storeService,
		StoreRepository $storeRepository
	) {
		$this->storeService = $storeService;
		$this->storeRepository = $storeRepository;
		$this->repository = $storeRepository;
	}
	
	#[OA\Get(
		path: '/api/stores',
		tags: ['Store'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
									  ref: '#/components/schemas/Store'
								  )
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request) : Response|ResponseFactory
	{
		$stores = $this->storeRepository->list($request->all());
		return response(new StoreListCollection($stores));
	}
	
	#[OA\Post(
		path: '/api/stores/create',
		requestBody: new OA\RequestBody(
			content:[
					new OA\MediaType(
						mediaType: 'multipart/form-data',
						schema: new OA\Schema(
									   properties: [
													   'name' => new OA\Property(property: 'name', type: 'string'),
													   'logo' => new OA\Property(property: 'logo', type: 'file'),
													   'platform_id' => new OA\Property(property: 'platform_id', type: 'string'),
													   'duePeriodStart' => new OA\Property(property: 'duePeriodStart', type: 'string'),
													   'duePeriodEnd' => new OA\Property(property: 'duePeriodEnd', type: 'string'),
												   ]
								   )
					)
				]
		),
		tags: ['Store'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Store'
			))
		]
	)]
	public function create(CreateStoreRequest $request) : Response|ResponseFactory
	{
		$store = $this->storeService->create($request->validated());
		return response(new StoreResource($store));
	}
	
	#[OA\Get(
		path: '/api/stores/{id}',
		tags: ['Store'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Store'
			))
		]
	)]
	public function get($id) : Response|ResponseFactory
	{
		$store = $this->storeRepository->find($id);
		return response(new StoreResource($store));
	}
	
	#[OA\Post(
		path: '/api/stores/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'name' => new OA\Property(property: 'name', type: 'string'),
							'logo' => new OA\Property(property: 'logo', type: 'string'),
							'platform_id' => new OA\Property(property: 'platform_id', type: 'string'),
							'duePeriodStart' => new OA\Property(property: 'duePeriodStart', type: 'string'),
							'duePeriodEnd' => new OA\Property(property: 'duePeriodEnd', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Store'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Store'
			))
		]
	)]
	public function update($id, Request $request) : Response|ResponseFactory
	{
		$store = $this->storeRepository->find($id);
		$this->storeService->update($store, $request->all());
		$store = $this->storeRepository->find($id);
		return response(new StoreResource($store));
	}
	
	#[OA\Get(
		path: '/api/stores/{id}/delete',
		tags: ['Store'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id) : Response|ResponseFactory
	{
		$store = $this->storeRepository->find($id);
		$this->storeRepository->deleteModel($store);
		return response('',200);
	}
}
