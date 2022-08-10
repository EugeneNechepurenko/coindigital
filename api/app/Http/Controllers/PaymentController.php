<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Payment\CreatePaymentRequest;
use App\Http\Resources\ListCollections\PaymentListCollection;
use App\Http\Resources\PaymentResource;
use App\Repositories\PaymentRepository;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class PaymentController extends Controller
{
	/** @var PaymentService */
	private $paymentService;
	/** @var PaymentRepository */
	private $paymentRepository;
	
	public function __construct(
		PaymentService $paymentService,
		PaymentRepository $paymentRepository
	) {
		$this->paymentService = $paymentService;
		$this->paymentRepository = $paymentRepository;
	}
	
	
	#[OA\Get(
		path: '/api/payments',
		tags: ['Payment'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				properties: [
					'data' => new OA\Property(
						property: 'data',
						type: 'array',
						items: new OA\Items(
							ref: '#/components/schemas/Payment'
						)
					),
				]
			))
		]
	)]
	public function list(DefaultListRequest $request)
	{
		$payments = $this->paymentRepository->list($request->all());
		return response(new PaymentListCollection($payments));
	}
	
	#[OA\Post(
		path: '/api/payments/create',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'payment_date' => new OA\Property(property: 'payment_date', type: 'string'),
							'email' => new OA\Property(property: 'email', type: 'string'),
							'account' => new OA\Property(property: 'account', type: 'string'),
							'tds' => new OA\Property(property: 'tds', type: 'string'),
							'tax' => new OA\Property(property: 'tax', type: 'string'),
							'total_amount' => new OA\Property(property: 'total_amount', type: 'string'),
							'reference' => new OA\Property(property: 'reference', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Payment'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Payment',
			))
		]
	)]
	public function create(CreatePaymentRequest $request)
	{
		$payment = $this->paymentService->create($request->validated());
		return response($payment);
	}
	
	#[OA\Get(
		path: '/api/payments/{id}',
		tags: ['Payment'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Payment',
			))
		]
	)]
	public function get($id)
	{
		$payment = $this->paymentRepository->find($id);
		return response(new PaymentResource($payment));
	}
	
	#[OA\Post(
		path: '/api/payments/{id}/update',
		requestBody: new OA\RequestBody(
			content:[
				new OA\MediaType(
					mediaType: 'multipart/form-data',
					schema: new OA\Schema(
						properties: [
							'payment_date' => new OA\Property(property: 'payment_date', type: 'string'),
							'email' => new OA\Property(property: 'email', type: 'string'),
							'account' => new OA\Property(property: 'account', type: 'string'),
							'tds' => new OA\Property(property: 'tds', type: 'string'),
							'tax' => new OA\Property(property: 'tax', type: 'string'),
							'total_amount' => new OA\Property(property: 'total_amount', type: 'string'),
							'reference' => new OA\Property(property: 'reference', type: 'string'),
						]
					)
				)
			]
		),
		tags: ['Payment'],
		responses: [
			new OA\Response(response: 200, description: 'AOK',content: new OA\JsonContent(
				ref: '#/components/schemas/Payment',
			))
		]
	)]
	public function update($id, Request $request)
	{
		$payment = $this->paymentRepository->find($id);
		$this->paymentService->update($payment, $request->all());
		$payment = $this->paymentRepository->find($id);
		return response(new PaymentResource($payment));
	}
	
	
	#[OA\Get(
		path: '/api/payments/{id}/delete',
		tags: ['Payment'],
		responses: [
			new OA\Response(response: 200, description: 'OK'),
		]
	)]
	public function delete($id)
	{
		$payment = $this->paymentRepository->find($id);
		$this->paymentRepository->deleteModel($payment);
		return response('',200);
	}
}
