<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 14.05.2018
 * Time: 11:55
 */
require_once __DIR__.'/../boot.php';
class Present
{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function savePresent ()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('INSERT INTO form (id_studenta, present, date) values($student_id, $present, $date)');


    }





}