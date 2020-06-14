<?php
namespace App\Controllers;

use App\Models\User;
use Base\Controller;

class Login extends Controller
{
    public function index()
    {
        if ($this->getUser()) {
            $this->redirect('/blog');
        }
        return $this->view->render('login.phtml',['title' => 'Главная', 'user' => $this->getUser()]);
    }

    public function auth()
    {
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];

        $user = User::getByEmail($email);
        if (!$user) {
            return 'Неправильный логин и пароль';
        }

        if ($user->getPassword() !== User::getPasswordHash($password)) {
            return 'Неправильный логин и пароль';
        }

        $this->session->authUser($user->getId());
        $this->redirect('/blog');
    }

    public function register()
    {
        $name = (string) $_POST['name'];
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $password2 = (string) $_POST['password_2'];

        if (!$name || !$password) {
            return 'Поля Имя и Пароль обязательны для заполнения';
        }

        if (!$email) {
            return 'Поле Email обязательно для заполнения';
        }

        if ($password !== $password2) {
            return 'Введенные пароли не совпадают';
        }

        if (mb_strlen($password) < 5) {
            return 'Необходимо ввести пароль, содержащий более 5 символов';
        }

        $userData = [
            'name' => $name,
            'password' => $password,
            'email' => $email,
        ];
        $user= new User($userData);
        $user->addUser();

        $this->session->authUser($user->getId());
        $this->redirect('/blog');
    }
}