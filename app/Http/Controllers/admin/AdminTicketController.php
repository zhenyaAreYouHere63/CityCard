<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ticket\StoreTicketRequest;
use App\Http\Requests\ticket\UpdateTicketRequest;
use App\Models\Card;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminTicketController extends Controller
{
    /**
     * @OA\Get(
     *     path="/admin/tickets",
     *     summary="Get list of tickets",
     *     operationId="getTickets",
     *     tags={"Tickets"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful get all tickets",
     *     @OA\JsonContent(
     *         type="array",
     *         @OA\Items(ref="#/components/schemas/Ticket")
     *       )
     *    )
     * )
     */
    public function index(): View
    {
        $tickets = Ticket::paginate(10);

        return view('admin.tickets.index', compact('tickets'));
    }

    public function create(): View
    {
        $cards = Card::all();

        return view('admin.tickets.create', compact('cards'));
    }

    /**
     * @OA\Post(
     *     path="/admin/tickets/store",
     *     summary="Store a new ticket",
     *     operationId="storeTicket",
     *     tags={"Tickets"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type", "card_id"},
     *             @OA\Property(
     *                 property="type",
     *                 type="string",
     *                 description="Ticket type"
     *             ),
     *             @OA\Property(
     *                 property="card_id",
     *                 type="integer",
     *                 description="ID of the card associated with the ticket"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ticket created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/Ticket"
     *         )
     *     )
     * )
     */
    public function store(StoreTicketRequest $request): RedirectResponse
    {
        Ticket::create($request->validated());

        return redirect()->route('admin.tickets.index');
    }

    public function edit(Ticket $ticket): View
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    /**
     * @OA\Patch(
     *     path="/admin/tickets/update/{ticket}",
     *     summary="Update an existing ticket",
     *     operationId="updateTicket",
     *     tags={"Tickets"},
     *     @OA\Parameter(
     *         name="ticket",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type"},
     *             @OA\Property(
     *                 property="type",
     *                 type="string",
     *                 description="Ticket type"
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/Ticket"
     *         )
     *     )
     * )
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $ticket->update($request->validated());

        return redirect()->route('admin.tickets.index');
    }

    /**
     * @OA\Delete(
     *     path="/admin/cities/destroy/{ticket}",
     *     summary="Delete an existing ticket",
     *     operationId="deleteTicket",
     *     tags={"Tickets"},
     *     @OA\Parameter(
     *          name="ticket",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="City deleted successfully",
     *      )
     *    )
     *  )
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index');
    }
}
