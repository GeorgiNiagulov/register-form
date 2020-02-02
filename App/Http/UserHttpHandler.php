<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class UserHttpHandler extends HttpHandlerAbstract{
  /**
   * @var UserServiceInterface
   */
  private $userService;

  public function __construct(
      TemplateInterface $template,
      DataBinderInterface $dataBinder,
      UserServiceInterface $userService)
      {
          parent::__construct($template, $dataBinder);
          $this->userService = $userService;
      }

      public function index()
      {
          $this->render("home/index");
      }

      public function register(array $formData = [])
      {
          if (isset($formData['register'])) {
              $this->handleRegisterProcess($formData);
          } else {
              $this->render("users/register");
          }
      }

      private function handleRegisterProcess($formData)
      {
          try {
              /** @var UserDTO $user */
              $user = $this->dataBinder->bind($formData, UserDTO::class);
              $this->userService->register($user, $formData['confirm_password']);
              $_SESSION['username'] = $user->getUsername();
              $this->redirect("all.php");
          } catch (\Exception $ex) {
              $this->render("users/register", null,
                  [$ex->getMessage()]);
          }
      }

      public function all()
      {
              $this->render("users/all", $this->userService->getAll());
      }

}
 ?>
