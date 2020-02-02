<?php

namespace App\Service;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) : bool;
    public function currentUser() : ?UserDTO;
    public function isLogged() : bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAll() : \Generator;

}
