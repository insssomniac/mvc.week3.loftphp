<?php
namespace Base;

use App\Models\User;

abstract class Controller
{
    /** @var View */
    protected $view;
    /** @var Session */
    protected $session;

    public function setView($view)
    {
        $this->view = $view;
    }

    public function setSession($session)
    {
        $this->session = $session;
    }

    public function getUser()
    {
        $userId = $this->session->getUserId();
        if (!$userId) {
            return null;
        }

        $user = User::getById($userId);
        if (!$user) {
            return null;
        }

        return $user;
    }

    public function getUserId()
    {
        if ($user = $this->getUser()) {
            return $user->getId();
        }

        return false;
    }

    public function redirect(string $url)
    {
        throw new RedirectException($url);
    }

    public function preDispatch()
    {

    }
}