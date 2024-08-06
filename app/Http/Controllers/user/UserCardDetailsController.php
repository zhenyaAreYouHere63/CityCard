<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserCardDetailsController extends Controller
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
     * )
     */
    public function showCardDetails(Request $request): View
    {
        $user = Auth::user();
        $cardId = $request->input('cardId');

        $card = $this->getCard($cardId, $user->id);

        $data = $this->prepareCardData($card);

        return view('user.functional.card-details', $data);
    }

    private function getCard(string $cardId, int $userId): Card
    {
        $card = Card::with(['tickets.tripHistory', 'topUpHistory',
        'costHistory'])
        ->where('number', $cardId)
        ->where('user_id', $userId)
        ->firstOrFail();

        if (!$card) {
            abort(404, 'Card not found');
        }

        return $card;
    }

    private function prepareCardData(Card $card): array
    {
        return [
            'card' => $card,
            'balance' => $card->balance,
            'tripHistory' => $card->tickets->flatMap->tripHistory,
            'topUpHistory' => $card->topUpHistory,
            'costHistory' => $card->costHistory,
        ];
    }
}
