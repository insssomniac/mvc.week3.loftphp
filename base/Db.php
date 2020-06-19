<?php
namespace Base;

class Db
{
    /** @var \PDO */
    private $pdo;
    private $log = [];
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function getDbConnect()
    {
        $host = DB_HOST;
        $dbName = DB_NAME;
        $dbUser = DB_USER;
        $dbParssword = DB_PASSWORD;

        if (!$this->pdo) {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbParssword);
        }

        return $this->pdo;
    }

    public function fetchAll(string $query, array $params = [])
    {
        $prepared = $this->getDbConnect()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);

            return [];
        }

        $data = $prepared->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function fetchOne(string $query, array $params = [])
    {
        $prepared = $this->getDbConnect()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);

            return [];
        }

        $data = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        $affectedRows = $prepared->rowCount();

        $this->log[] = [$query, $affectedRows];
        if (!$data) {
            return false;
        }

        return reset($data);
    }

    public function execQuery(string $query, array $params = []): int
    {
        $prepared = $this->getDbConnect()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return 0;
        }

        $affectedRows = $prepared->rowCount();

        return $affectedRows;
    }

    public function lastInsertedId()
    {
        return $this->getDbConnect()->lastInsertId();
    }

}


