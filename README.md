# Performance App Example

## Install and Run

1. Stop Tutora if it is running
2. Clone the repository
3. Run `cp .env.example .env`
4. Run `docker-compose up -d`
5. Run `docker exec laravel composer install`
6. Run `docker exec laravel npm install`
7. Run `docker exec laravel php artisan migrate:refresh --seed`
8. Run `docker exec laravel npm run dev`
9. Open [http://localhost:80/](http://localhost:80/)

## Login

Email: test@example.com

Password: password

### Troubleshooting
1. Port 80 is already in use on Mac. Run `sudo apachectl stop`
2. Permission denied error. Give terminal Full Disk Access permission in system Privacy Preferences.
