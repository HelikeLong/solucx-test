<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\Request;

trait RestActions {
    use ApiResponser;

    private $m = self::Model;

    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return $this->successResponse($this->m::all());
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function get($id): JsonResponse
    {
        $items = $this->m::find($id);
        if(is_null($items)){
            return $this->errorResponse(Response::HTTP_NOT_FOUND);
        }
        return $this->successResponse($items);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request,$this->m::$rules);
        return $this->successResponse($this->m::create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request,$this->m::$rules);
        $model = $this->m::find($id);
        if(is_null($model)){
            return $this->errorResponse(Response::HTTP_NOT_FOUND);
        }
        $model->update($request->all());
        return $this->successResponse($model);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        if(is_null($this->m::find($id))){
            return $this->errorResponse(Response::HTTP_NOT_FOUND);
        }
        $this->m::delete($id);
        return $this->successResponse([], Response::HTTP_NO_CONTENT);
    }
}
