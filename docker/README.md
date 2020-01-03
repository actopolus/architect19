## Compose
Поднимает инфраструктуру php-fpm, nginx, mysql:
```
docker-compose -f docker/docker-compose.yml --project-directory /project-dir up -d
```

## Applications
Приложения:

- db
- webserver
- app

### Bash
Запускает bash в приложении:
```
docker-compose -f docker/docker-compose.yml --project-directory /project-dir exec [app name] bash
```

## Tinker
Tinker console запускает консоль в окружении Laravel для быстрой проверки кода:
```
docker-compose -f docker/docker-compose.yml --project-directory /project-dir exec app php artisan tinker
```
