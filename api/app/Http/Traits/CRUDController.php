<?php
	
	namespace App\Http\Traits;
	use Illuminate\Http\Request;
	use OpenApi\Annotations as OA;
	
	trait CRUDController {
		
//		public function all()
//		{
//			$data = $this->repository->list();
//			return response(new $this->ListCollection($data));
//		}
		
//		public function create(Request $request)
//		{
//			$data = $this->service->create($request->all());
//			return redirect(route($this->rout_all));
//		}
//
//		public function update($id, Request $request)
//		{
//			$data = $this->repository->find($id);
//			$this->service->update($data, $request->all());
//			return redirect(route($this->rout_all));
//		}
//
//		public function delete($id)
//		{
//			$data = $this->repository->find($id);
//			$this->repository->deleteModel($data);
//			return redirect(route($this->rout_all));
//		}
	}