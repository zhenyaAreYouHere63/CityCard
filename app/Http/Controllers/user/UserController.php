<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/user/card",
     *     summary="Get card details",
     *     operationId="getDetailsOfCard",
     *     tags={"Cards"},
     *     @OA\Parameter(
     *         name="cardId",
     *         in="query",
     *         description="ID of the card to retrieve details for",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful get card details",
     *         @OA\JsonContent(
     *             type="object",
     *                  @OA\Property(
     *                  property="card",
     *                  type="object",
     *                  @OA\Property(property="number", type="string"),
     *                  @OA\Property(property="balance", type="number", format="float"),
     *                  @OA\Property(
     *                      property="tickets",
     *                      type="array",
     *                      @OA\Items(
     *                          type="object",
     *                          @OA\Property(property="id", type="integer"),
     *                          @OA\Property(
     *                              property="tripHistory",
     *                              type="array",
     *                              @OA\Items(ref="#/components/schemas/TripHistory")
     *                          )
     *                      )
     *                    )
     *                  ),
     *             @OA\Property(
     *                 property="topUpHistory",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/TopUpHistory")
     *             ),
     *             @OA\Property(
     *                 property="costHistory",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/CostHistory")
     *             ),
     *         )
     *     ),
     *    @OA\Response(
     *    response=200,
     *    description="Successful get all data with card",
     *     )
     * )
     */
    public function showCardDetails(Request $request)
    {
        $user = Auth::user();
        $cardId = $request->input('cardId');

        try {
            $card = Card::with(['tickets.tripHistory', 'topUpHistory',
                'costHistory'])
                ->where('number', $cardId)
                ->where('user_id', $user->id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response(['message' => 'Card not found'], 404);
        }

        $balance = $card->balance;
        $tripHistory = $card->tickets->flatMap->tripHistory;
        $topUpHistory = $card->topUpHistory;
        $costHistory = $card->costHistory;

        return view('user.functional.card-details', compact('card',
            'balance', 'tripHistory', 'topUpHistory', 'costHistory'));
    }
}
