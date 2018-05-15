<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 11.05.2018
 * Time: 11:13
 */

require_once __DIR__.'/../boot.php';
class PdoFormStorage
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
        $statement = $pdo->prepare('SELECT * FROM form');
        $statement->execute();
        $formsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $formsArray;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleFormData($school_id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM form WHERE school_id =:school_id');
        $statement->execute(array(':school_id' => $school_id));
        $formArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $formArray;
    }
//fetchAll(\PDO::FETCH_ASSOC);

}