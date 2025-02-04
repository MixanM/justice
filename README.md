1 . Поднять контейнеры 
    docker-compose build
    docker-compose up -d
2. ЗАпустить миграции
3. выполнить сидер городов
   php artisan db:seed --class=CitiesSeeder
