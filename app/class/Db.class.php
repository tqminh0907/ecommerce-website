<?php 

class  Db
{
    protected static $pdo;
    private $lastId;
                   
    public function __construct()
    {
        self::$pdo= new PDO('mysql:host='.host.';dbname='.dbname, username,password);
        self::$pdo->query('set names utf8');
    }

    public function lastId()
    {
        return $lastId = self::$pdo->lastInsertId();
    }

    protected function selectQuery($sql, $arr=[])
    {
        $stm = self::$pdo->prepare($sql);
        $stm->execute($arr);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    protected function updateQuery($sql, $arr=[])
    {
        $stm = self::$pdo->prepare($sql);
        $stm->execute($arr);
        return $stm->rowCount();
    }
}
?>