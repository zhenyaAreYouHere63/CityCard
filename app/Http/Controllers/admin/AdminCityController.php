<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\city\StoreCityRequest;
use App\Http\Requests\city\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminCityController extends Controller
{
    /**
     * @OA\Get(
     *     path="/admin/cities",
     *     summary="Get list of cities",
     *     operationId="getCities",
     *     tags={"Cities"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful get all cities",
     *     @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/City")
     *         )
     *      )
     *   )
     */
    public function index(): View
    {
        $cities = City::paginate(10);

        return view('admin.cities.index', compact('cities'));
    }

    public function create(): View
    {
        return view('admin.cities.create');
    }

    /**
     * @OA\Post(
     *     path="/admin/cities/store",
     *     summary="Store a new city",
     *     operationId="storeCity",
     *     tags={"Cities"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Name of the city"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="City created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/City"
     *         )
     *     )
     * )
     */
    public function store(StoreCityRequest $request): RedirectResponse
    {
        City::create($request->validated());

        return redirect()->route('admin.cities.index');
    }

    public function edit(City $city): View
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * @OA\Patch(
     *     path="/admin/cities/update/{city}",
     *     summary="Update an existing city",
     *     operationId="updateCity",
     *     tags={"Cities"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Name of the city"
     *             )
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="city",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="City updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/City"
     *         )
     *     )
     * )
     */
    public function update(UpdateCityRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        return redirect()->route('admin.cities.index');
    }

    /**
     * @OA\Delete(
     *     path="/admin/cities/destroy/{city}",
     *     summary="Delete an existing city",
     *     operationId="deleteCity",
     *     tags={"Cities"},
     *     @OA\Parameter(
     *          name="city",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *     @OA\Response(
     *         response=204,
     *         description="City deleted successfully",
     *    )
     *   )
     * )
     */
    public function destroy(City $city): RedirectResponse
    {
        $city->delete();

        return redirect()->route('admin.cities.index');
    }
}
