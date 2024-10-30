<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public static function apiPaginate($query, $request)
    {
        $pagesize = $request->page_size ?? 3;
        return static::collection($query->paginate($pagesize)->appends($request->query()))
        ->response()
        ->getdata();
    }
}
