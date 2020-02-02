<?php

namespace App\Repository;

use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class UserRepository extends DatabaseAbstract implements UserRepositoryInterface
{
  public function __construct(DatabaseInterface $database,
                              DataBinderInterface $dataBinder)
  {
      parent::__construct($database, $dataBinder);
  }

  public function insert(UserDTO $userDTO): bool
  {
      $this->db->query(
          "
          INSERT INTO users(first_name, middle_name, last_name, pin, username, user_password)
                VALUES(?,?,?,?,?,?)
           "
      )->execute([
          $userDTO->getFirstName(),
          $userDTO->getMiddleName(),
          $userDTO->getLastName(),
          $userDTO->getPin(),
          $userDTO->getUsername(),
          $userDTO->getUserPassword()
      ]);

      return true;
  }

  public function findOneByUsername(string $username): ?UserDTO
  {
      return $this->db->query(
          "
          SELECT id,
                  first_name as userName,
                  middle_name as middleName,
                  last_name AS lastName,
                  pin,
                  username,
                  user_password as userPassword,
                FROM users
                WHERE username = ?
           "
      )->execute([$username])
          ->fetch(UserDTO::class)
          ->current();
  }

  /**
   * @return \Generator|UserDTO[]
   */
  public function findAll(): \Generator
  {

      return $this->db->query(
          "
              SELECT id,
                    first_name as firstName,
                    middle_name as middleName,
                    last_name AS lastName,
                    pin,
                    username,
                    user_password as userPassword
              FROM users
              ORDER BY firstName
          "
      )->execute()
          ->fetch(UserDTO::class);
  }

}
 ?>
