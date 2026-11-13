# WeatherApp — Погодное приложение (Laravel 13 + Livewire + Flux)

Учебный проект: погода на сегодня/неделю, REST API, админ-панель, аутентификация (2FA, passkeys), PostgreSQL, Docker.

## Запуск через Docker

cp .env.docker .env
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan storage:link
docker-compose exec app npm install && npm run build

    Сайт: http://localhost:8083

    pgAdmin: http://localhost:8084 (admin@weather.ru / weather_admin)

Стек

Laravel 13, Livewire, Flux, Fortify, PostgreSQL 15, Vite, Tailwind, Pest, Docker.