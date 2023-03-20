
## Online-Event-Ticket-WebApp

Online ticket booking web-app for events implemented using Laravel

## Features

Admin portal
- Perform CRUD operations on events, users, categories
- Manage all events, users, orders
- Users role delegation

Organizer portal

- Create events
- Events management

User portal
- Profile
- Tickets with QR code, print option


## Setup

- git clone https://github.com/ivaitele/Academy_project.git may_app
- cd my_app

- docker-compose build

- docker-compose up -d
- docker-compose exec <laravel.test> composer install
- docker-compose exec <laravel.test> cp .env.example .env
- php artisan migrate
- php artisan db:seed
