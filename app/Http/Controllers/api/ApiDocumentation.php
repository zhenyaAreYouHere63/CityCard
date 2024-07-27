<?php

namespace App\Http\Controllers\api;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="CityCard API",
 *         version="1.0"
 *     ),
 *     @OA\Components(
 *         @OA\Schema(
 *             schema="City",
 *             type="object",
 *             title="City",
 *             required={"id", "name"},
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="City ID"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="City name"
 *             ),
 *             @OA\Property(
 *                 property="created_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="Timestamp when the city was created"
 *             ),
 *             @OA\Property(
 *                 property="updated_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="Timestamp when the city was updated"
 *             )
 *         ),
 *         @OA\Schema(
 *             schema="Ticket",
 *             type="object",
 *             title="Ticket",
 *             required={"id", "card_id", "type"},
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="Ticket ID"
 *             ),
 *             @OA\Property(
 *                 property="card_id",
 *                 type="integer",
 *                 description="ID of the card associated with the ticket"
 *             ),
 *             @OA\Property(
 *                 property="type",
 *                 type="string",
 *                 description="Ticket type"
 *             ),
 *             @OA\Property(
 *                 property="created_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="Timestamp when the ticket was created"
 *             ),
 *             @OA\Property(
 *                 property="updated_at",
 *                 type="string",
 *                 format="date-time",
 *                 description="Timestamp when the ticket was updated"
 *             )
 *         ),
 *         @OA\Schema(
 *              schema="Transport",
 *              type="object",
 *              title="Transport",
 *              required={"id", "cities_id", "name", "price"},
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *                  description="Ticket ID"
 *              ),
 *              @OA\Property(
 *                  property="cities_id",
 *                  type="integer",
 *                  description="ID of the city associated with the transport"
 *              ),
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *                  description="Transport name"
 *              ),
 *              @OA\Property(
 *                   property="price",
 *                   type="double",
 *                   description="Price of transport services"
 *               ),
 *              @OA\Property(
 *                  property="created_at",
 *                  type="string",
 *                  format="date-time",
 *                  description="Timestamp when the ticket was created"
 *              ),
 *              @OA\Property(
 *                  property="updated_at",
 *                  type="string",
 *                  format="date-time",
 *                  description="Timestamp when the ticket was updated"
 *              )
 *         ),
 *         @OA\Schema(
 *               schema="TripHistory",
 *               type="object",
 *               title="TripHistory",
 *               required={"id", "ticket_id", "route", "date"},
 *               @OA\Property(
 *                   property="id",
 *                   type="integer",
 *                   description="Ticket ID"
 *               ),
 *               @OA\Property(
 *                    property="ticket_id",
 *                    type="integer",
 *                    description="ID of the ticket associated with the TripHistory"
 *                ),
 *                @OA\Property(
 *                     property="route",
 *                     type="string",
 *                     description="route"
 *                ),
 *               @OA\Property(
 *                      property="date",
 *                      type="date-time",
 *                      description="Start of the route"
 *               ),
 *               @OA\Property(
 *                   property="created_at",
 *                   type="string",
 *                   format="date-time",
 *                   description="Timestamp when the ticket was created"
 *               ),
 *               @OA\Property(
 *                   property="updated_at",
 *                   type="string",
 *                   format="date-time",
 *                   description="Timestamp when the ticket was updated"
 *               )
 *          ),
 *          @OA\Schema(
 *                schema="CostHistory",
 *                type="object",
 *                title="CostHistory",
 *                required={"id", "card_id", "expense", "date"},
 *                @OA\Property(
 *                    property="id",
 *                    type="integer",
 *                    description="Ticket ID"
 *                ),
 *                @OA\Property(
 *                     property="card_id",
 *                     type="integer",
 *                     description="ID of the card associated with the CostHistory"
 *                 ),
 *                 @OA\Property(
 *                      property="expense",
 *                      type="double",
 *                      description="expense"
 *                 ),
 *                @OA\Property(
 *                       property="date",
 *                       type="date-time",
 *                       description="expense"
 *                ),
 *                @OA\Property(
 *                    property="created_at",
 *                    type="string",
 *                    format="date-time",
 *                    description="Timestamp when the ticket was created"
 *                ),
 *                @OA\Property(
 *                    property="updated_at",
 *                    type="string",
 *                    format="date-time",
 *                    description="Timestamp when the ticket was updated"
 *                )
 *           ),
 *           @OA\Schema(
 *                 schema="TopUpHistory",
 *                 type="object",
 *                 title="TopUpHistory",
 *                 required={"id", "card_id", "replenishment", "date"},
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="Ticket ID"
 *                 ),
 *                 @OA\Property(
 *                      property="card_id",
 *                      type="integer",
 *                      description="ID of the card associated with the TopUpHistory"
 *                  ),
 *                  @OA\Property(
 *                       property="replenishment",
 *                       type="double",
 *                       description="replenishment"
 *                  ),
 *                 @OA\Property(
 *                        property="date",
 *                        type="date-time",
 *                        description="topUp"
 *                 ),
 *                 @OA\Property(
 *                     property="created_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Timestamp when the ticket was created"
 *                 ),
 *                 @OA\Property(
 *                     property="updated_at",
 *                     type="string",
 *                     format="date-time",
 *                     description="Timestamp when the ticket was updated"
 *                 )
 *            )
 *     )
 * )
 */
class ApiDocumentation
{

}
