<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefaultListRequest;
use App\Http\Requests\Track\CreateTrackRequest;
use App\Http\Resources\ListCollections\StoreListCollection;
use App\Http\Resources\ListCollections\StoreSalesListCollection;
use App\Http\Resources\ListCollections\TrackListCollection;
use App\Http\Resources\ListCollections\TrackSalesListCollection;
use App\Http\Resources\TrackResource;
use App\Models\Store;
use App\Models\Track;
use App\Repositories\StoreRepository;
use App\Repositories\TrackRepository;
use App\Services\StoreService;
use App\Services\TrackService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class SalesController extends Controller
{
	/** @var TrackService */
	private $trackService;
	/** @var TrackRepository */
	private $trackRepository;
	/** @var StoreService */
	private $storeService;
	/** @var StoreRepository */
	private $storeRepository;
	
	public function __construct(
		TrackService $trackService,
		TrackRepository $trackRepository,
		StoreService $storeService,
		StoreRepository $storeRepository
	) {
		$this->trackService = $trackService;
		$this->trackRepository = $trackRepository;
		$this->storeService = $storeService;
		$this->storeRepository = $storeRepository;
	}
	
	public function chanelRevenue(DefaultListRequest $request)
	{
		$stores = $this->storeRepository->list($request->all());
		return response(new StoreSalesListCollection($stores));
	}
	public function chanelRevenueTotal(DefaultListRequest $request)
	{
		$stores = $this->storeRepository->list($request->all());
		$unit_sold = 0;
		$gross = 0;
		$net = 0;
		foreach ($stores as $store){
			/* @var $store Store */
			$unit_sold += $store->totalSold();
			$gross += $store->gross;
			$net += $store->net;
		}

		return response()->json([
			'unit_sold'=>$unit_sold,
			'gross'=>$gross,
			'net'=>$net,
		]);
	}
	public function topTracks(DefaultListRequest $request)
	{
		$tracks = $this->trackRepository->list($request->all());
		return response(new TrackSalesListCollection($tracks));
	}
	public function topTracksTotal(DefaultListRequest $request)
	{
		$tracks = $this->trackRepository->list($request->all());
		$unit_sold = 0;
		$gross = 0;
		$net = 0;
		foreach ($tracks as $track){
			/* @var $track Track */
			$unit_sold += $track->sold;
//			$gross += $track->gross;
//			$net += $track->net;
		}
		
		return response()->json([
									'unit_sold'=>$unit_sold,
									'gross'=>$gross,
									'net'=>$net,
								]);
	}
	
	
	public function trackInfo(DefaultListRequest $request)
	{
//		$tracks = $this->trackRepository->list($request->all());
//		return response(new TrackListCollection($tracks));
	}
}
