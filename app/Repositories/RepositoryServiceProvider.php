<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider сервис репозиториев
 *
 * @package App\Repositories
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Регистрирует биндинги репозиториев
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
