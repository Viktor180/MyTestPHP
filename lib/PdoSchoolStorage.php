<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 10.05.2018
 * Time: 13:32
 */
require_once __DIR__.'/../boot.php';

class PdoSchoolStorage
{
private $pdo;

    /**
     * PdoSchoolStorage constructor.
     * @param PDO $pdo
     */

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */
    public function fetchAllSchoolData()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM school');
        $statement->execute();
        $schoolsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $schoolsArray;
        }

    /**
     * @param $id
     * @return mixed
     */
    public function fetchSingleSchoolData($id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM school WHERE id= :school_id');
        $statement->execute(array('school_id' => $id));
        $schoolArray = $statement->fetch(PDO::FETCH_ASSOC);

        return $schoolArray;
    }




}