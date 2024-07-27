# City card

CityCard is a Laravel-based web application that allows users to manage transportation cards, view trip, top-up and cost histories 
and provides administrators with the ability to manage cities, ticket types, and transportation.

## Features
1. **Database Design:**
    - Users (user data)
    - Cards(user cards)
    - Tickets(ticket types)
    - Cities(available cities)
    - Transports(types of transport)
    - Trip history (route taken by the user)
    - Top-up history (when the card was top-up)
    - Cost history (when the card was used)

2. **Laravel Project:**
    - **Migrations:** based on the designed database
    - **User Authentication with Roles:**
        - Users log in using card numbers and phone numbers
        - Admins log in using email and password (admins created via seeding)
    - **User Functionality:**
        - Display card balance, view trip, cost and top-up histories
    - **Administrator Functionality:**
        - Create/edit/delete cities, ticket types, transport
    - **Api Documentation:**
        - API documentation is available at /api/docs. 
    Documentation is generated using the l5-swagger package.

## Environment Setup
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/zhenyaAreYouHere63/CityCard.git
   cd CityCard
2. Install dependencies:
   ```bash
   composer install
3. Run migrations sequentially:
   ```bash 
   php artisan migrate:fresh --seed 
4. Start the server:
   ```bash 
   php artisan serve
