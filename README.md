Start project for the first time with 
`UID=${UID} GID=${GID} docker compose up --build -d`
`docker exec -i nora_php composer install`
`docker exec -i nora_php php artisan key:generate`
`docker exec -i nora_php php artisan migrate`
`docker exec -i nora_php php artisan db:seed --class=TestDataSeeder`

`docker exec -i nora_php npm install`
`docker exec -i nora_php npm run dev`

Start project
`UID=${UID} GID=${GID} docker compose up -d`
`docker exec -i nora_php npm run dev`

Down project
`UID=${UID} GID=${GID} docker compose down`
