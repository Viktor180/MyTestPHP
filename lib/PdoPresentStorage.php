<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 14.05.2018
 * Time: 11:56
 */

require_once __DIR__.'/../boot.php';
class PdoPresentStorage

{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */
    public function fetchAllFormData()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM present');
        $statement->execute();
        $presentArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $presentArray;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleFormData($id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM present WHERE id= :id');
        $statement->execute(array('id' => $id));
        $presentArray = $statement->fetch(\PDO::FETCH_ASSOC);

        return $presentArray;
    }



}