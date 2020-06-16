<?php
namespace App\Models;

use Base\Db;

class User
{
    private $id;
    private $name;
    private $password;
    private $email;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->password = $data['password'];
        $this->email = $data['email'];
    }

    public static function getByEmail(string $email)
    {
        $db = Db::getInstance();
        $data = $db->fetchOne("SELECT * FROM users WHERE email = :email", [':email' => $email]);
        if (!$data) {
            return null;
        }

        $user = new self($data);
        $user->id = $data['id'];
        return $user;
    }

    public static function getByIds(array $userIds)
    {
        $db = Db::getInstance();
        $idsString = implode(',', $userIds);
        $data = $db->fetchAll("SELECT * FROM users WHERE id IN($idsString)");
        if (!$data) {
            return [];
        }

        $users = [];
        foreach ($data as $elem) {
            $user = new self($elem);
            $user->id = $elem['id'];
            $users[$user->id] = $user;
        }

        return $users;
    }

    public function addUser()
    {
        $db = Db::getInstance();
        $res = $db->execQuery("INSERT INTO users (name, password, email) 
            VALUES (:name, :password, :email)",
            [
                ':name' => $this->name,
                ':password' => self::getPasswordHash($this->password),
                'email' => $this->email,
            ]
        );

        $this->id = $db->lastInsertedId();

        return $res;
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $data = $db->fetchOne("SELECT * FROM users WHERE id = :id", [':id' => $id]);
        if (!$data) {
            return null;
        }
        $user = new self($data);
        $user->id = $id;

        return $user;
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('fg#%^&hj' . $password);
    }

    public function isAdmin(): bool
    {
        return in_array($this->id, ADMIN_IDS);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


}