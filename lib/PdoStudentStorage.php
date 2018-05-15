<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 11.05.2018
 * Time: 11:51
 */

require_once __DIR__ .'/../boot.php';
class PdoStudentStorage
{

    private $pdo;


    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllStudentData()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM student');
        $statement->execute();
        $studentsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $studentsArray;
    }

    public function fetchSingleStudentById ($form_id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM student WHERE form_id= :form_id');
        $statement->execute(array(':form_id' => $form_id));
        $studentArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $studentArray;

    }





}