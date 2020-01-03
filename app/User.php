<?php

namespace App;

use Illuminate\Auth\GenericUser;

/**
 * Class User описывает аттрибуты пользователя
 *
 * @package App
 */
class User extends GenericUser
{
    /**
     * Возвращает имя
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Возвращает фамилию
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }
}
