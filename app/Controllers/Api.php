<?php
namespace App\Controllers;

use App\Models\Post;
use Base\Controller;

class Api extends Controller
{
    public function getUserMessages()
    {
        $userId = (int) $_GET['user_id'] ?? 0;
        if (!$userId) {
            return $this->response(['error' => 'no_user_id']);
        }
        $posts = Post::getUserPosts($userId, 20);
        if (!$posts) {
            return $this->response(['error' => 'no_posts']);
        }

        $data = array_map(function (Post $post) {
            return $post->getData();
        }, $posts);

        return $this->response(['posts' => $data]);
    }

    public function response(array $data)
    {
        header('Content-type: application/json');
        return json_encode($data);
    }
}