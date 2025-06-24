1. Clone the Repository

git clone https://github.com/fahmie/program_playing_card.git
cd cardDistributor

2. Run Docker Compose
docker-compose up -d --build

3. Enter the app container
docker-compose exec app bash

4. Install Composer dependencies
composer install
php artisan key:generate
php artisan config:cache

5.Access the Project
Visit: http://localhost:8080





