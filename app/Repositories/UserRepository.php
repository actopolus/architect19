<?php
namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository реплизация репозитория пользователей
 *
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * Возвращает построитель запросов к таблице пользователей
     *
     * @return \Illuminate\Database\Query\Builder
     */
    private function table()
    {
        return DB::table('users');
    }

    /**
     * Возвращает пользователя из базы данных по идентификатору
     *
     * @param  int $id
     * @return User|null
     */
    public function get(int $id): ?User
    {
        $item = $this->table()->find($id);

        if ($item === null) {
            return null;
        }

        return new User(get_object_vars($item));
    }

    /**
     * Сохраняет пользователя в хранилище
     *
     * @param  array $data
     * @return User
     */
    public function store(array $data): User
    {
        if (!$this->table()->insert($data)) {
            return null;
        }

        return new User($data);
    }

    /**
     * Возвращает всех пользователей из хранилища
     *
     * @return array
     */
    public function all(): array
    {
        $collection = $this->table()->get();

        return $collection->map(function ($item) {
            return new User(get_object_vars($item));
        })->all();
    }

}
