<?php
namespace App\Controllers;

use App\Models\Post;
use Base\Controller;
use http\Message;

class Admin extends Controller
{
    public function preDispatch()
    {
        parent::preDispatch();
        if (!$this->getUser() || !$this->getUser()->isAdmin()){
            $this->redirect('/');
        }
    }

    public function deletePost()
    {
        $postId = (int) $_GET['id'];
        Post::deletePost($postId);
        $this->redirect('/blog');
    }
}