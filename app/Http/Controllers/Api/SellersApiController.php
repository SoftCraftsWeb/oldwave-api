<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SellersResource;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SellersApiController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $seller = Seller::actions()->storeOrUpdate($request->validated())->getModel();
        return SellersResource::make($seller)->response()->setStatusCode(201);
    }

    public function update(Request $request, Seller $seller): JsonResponse
    {
        $seller = Seller::actions()->storeOrUpdate($request->validated(), $seller);
        return SellersResource::make($seller)->response()->setStatusCode(201);
    }

    public function destroy(Seller $seller): JsonResponse
    {
        $seller->delete();
        return response()->json(['status' => '201', 'message' => 'se ha eliminado correctamente el vendedor que has elegido']);
    }
}
