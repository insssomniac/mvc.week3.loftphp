<?php
namespace App\Controllers;

use App\Models\Post;
use Base\Controller;
use http\Message;

class Blog extends Controller
{
    public function index()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }
        $posts = Post::getList();

        if ($posts) {
            $userIds = array_map(function (Post $post) {
                return $post->getAuthorId();
            }, $posts);

            $users = \App\Models\User::getByIds($userIds);
            array_walk($posts, function (Post $post) use ($users) {
                if (isset($users[$post->getAuthorId()])) {
                    $post->setAuthor($users[$post->getAuthorId()]);
                }
            });
        }
        return $this->view->render('blog.phtml', ['posts' => $posts, 'user' => $this->getUser()]);
    }

    public function createPost()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }

        $text = (string) $_POST['text'];
        if (!$text) {
            $this->error('Поле Текст обязательно для заполнения');
        }

        $post = new Post([
            'text' => $text,
            'author_id' => $this->getUserId(),
        ]);

        if (isset($_FILES ['image']['tmp_name'])) {
            $post->loadFile($_FILES['image']['tmp_name']);
        }

        $post->createPost();
        $this->redirect('/blog');
    }

    private function error()
    {

    }
}
