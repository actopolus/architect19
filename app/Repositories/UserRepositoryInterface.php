<?php
namespace App\Repositories;

use App\User;

/**
 * Interface UserRepositoryInterface описывает методы репозитория пользователей
 *
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * Возвращает пользователя
     *
     * @param  int $id
     * @return User|null
     */
    public function get(int $id): ?User;

    /**
     * Сохраняет данные пользователя
     *
     * @param  array $data
     * @return User
     */
    public function store(array $data): User;

    /**
     * Возвращает всех пользователей
     *
     * @return User[]
     */
    public function all(): array;
}
