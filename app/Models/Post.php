<?php
namespace App\Models;

use Base\Db;
use Intervention\Image\ImageManagerStatic as IImage;

class Post
{
    private $id;
    private $title;
    private $text;
    private $createdAt;
    private $authorId;

    /** @var User */
    private $author;
    private $image;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->text = $data['text'];
        $this->authorId = $data['author_id'];
        $this->image = $data['image'] ?? '';
        $this->createdAt = $data['created_at'] ?? '';
    }

    public function createPost()
    {
        $db = Db::getInstance();
        $res = $db->execQuery("INSERT INTO posts (title, text, author_id, image) 
            VALUES (:title, :text, :author_id, :image)",
            [':title' => $this->title, ':text' => $this->text, ':author_id' => $this->authorId, ':image' => $this->image]);

        return $res;
    }

    public static function getList(int $limit = 20): array
    {
        $db = Db::getInstance();
        $data = $db->fetchAll("SELECT * FROM posts LIMIT $limit");
        if (!$data){
            return [];
        }

        $posts = [];
        foreach ($data as $elem) {
            $post = new self($elem);
            $post->id = $elem['id'];
            $posts[] = $post;
        }

        return $posts;
    }

    public static function getUserPosts(int $userId, int $limit = 20): array
    {
        $db = Db::getInstance();
        $data = $db->fetchAll("SELECT * FROM posts WHERE author_id = $userId LIMIT $limit");
        if (!$data) {
            return [];
        }

        $posts = [];
        foreach ($data as $elem) {
            $post = new self($elem);
            $post->id = $elem['id'];
            $posts[] = $post;
        }

        return $posts;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->image = $this->genFileName();
            move_uploaded_file($file, getcwd() . '/images/' . $this->image);
            $image = 'images/' . $this->image;
            $this->imageHandler($image);
        }
    }

    public function imageHandler(string $image)
    {
        $img = IImage::make($image)
            ->resize(800, null, function ($constraint){
                $constraint->aspectRatio();
            })
            ->text('YAIB',20,20, function($font){
                $font->size(30);
                $font->color('#E7E7E7');
            })
            ->save($image);
    }

    /**
     * @return mixed|string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getData()
    {
        return[
            'id' => $this->id,
            'author_id' => $this->authorId,
            'title' => $this->title,
            'text' => $this->text,
            'created_at' => $this->createdAt,
            'image' => $this->image,
        ];
    }

    public static function deletePost(int $postId)
    {
        $db = Db::getInstance();
        $pic = $db->fetchOne("SELECT image FROM posts WHERE id = :postId", [':postId' => $postId]);
        $query = "DELETE FROM posts WHERE id = $postId";
        $ret = $db->execQuery($query);
        if ($ret == true && $pic['image']) {
            $imgPath = 'images/' . $pic['image'];
            if (file_exists($imgPath)) {
                unlink($imgPath);
                return $ret;
            }
        }

        return $ret;
    }
}