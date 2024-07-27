<?php

namespace App\Http\Controllers;

use App\Http\Requests\ticket\StoreTicketRequest;
use App\Http\Requests\transport\StoreTransportRequest;
use App\Http\Requests\transport\UpdateTransportRequest;
use App\Models\City;
use App\Models\Transport;

class TransportController extends Controller
{
    /**
     * @OA\Get(
     *     path="/admin/transports",
     *     summary="Get list of transports",
     *     operationId="getTransports",
     *     tags={"Transports"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful get all transports",
     *     @OA\JsonContent(
     *         type="array",
     *          @OA\Items(ref="#/components/schemas/Transport")
     *      )
     *   )
     * )
     */
    public function index()
    {
        $transports = Transport::all();
        return view('admin.transports.index', compact('transports'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.transports.create', compact('cities'));
    }

    /**
     * @OA\Post(
     *     path="/admin/transports/store",
     *     summary="Store a new transport",
     *     operationId="storeTransport",
     *     tags={"Transports"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price", "cities_id"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Name of the transport"
     *             ),
     *             @OA\Property(
     *                 property="price",
     *                 type="integer",
     *                 description="Price of transport services"
     *             ),
     *             @OA\Property(
     *                 property="cities_id",
     *                 type="integer",
     *                 description="Id of the city associated with the transport"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Transport created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/Transport"
     *         )
     *     )
     * )
     */
    public function store(StoreTransportRequest $request)
    {
        Transport::create($request->validated());

        return redirect()->route('admin.transports.index');
    }

    public function edit(Transport $transport)
    {
        return view('admin.transports.edit', compact('transport'));
    }

    /**
     * @OA\Patch(
     *     path="/admin/transports/update/{transport}",
     *     summary="Update an existing transport",
     *     operationId="updateTransport",
     *     tags={"Transports"},
     *     @OA\Parameter(
     *         name="transport",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Name of the transport"
     *             ),
     *             @OA\Property(
     *                 property="price",
     *                 type="integer",
     *                 description="Price of transport services"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Transport updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/Transport"
     *         )
     *     )
     * )
     */
    public function update(UpdateTransportRequest $request, Transport $transport)
    {
        $transport->update($request->validated());

        return redirect()->route('admin.transports.index');
    }

    /**
     * @OA\Delete (
     *     path="/admin/transports/destroy/{transport}",
     *     summary="Delete an existing transport",
     *     operationId="deleteTransport",
     *     tags={"Transports"},
     *          @OA\Parameter(
     *         name="transport",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *        ),
     *     @OA\Response(
     *         response=204,
     *         description="Transport delete successfully",
     *     ),
     *   )
     * )
     */
    public function destroy(Transport $transport)
    {
        $transport->delete();

        return redirect()->route('admin.transports.index');
    }
}
