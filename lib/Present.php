<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 14.05.2018
 * Time: 11:55
 */

/*var_dump($_POST['datepicker']);
var_dump($_POST['student_id']);*/


require_once __DIR__.'/../boot.php';

class Present
{

    /*public function wow(){

    $count = count( $_POST['present'] );
    for ( $i = 0; $i < $count; $i++ )
    echo $_POST['present'][$i], '<br />';
    die;
    }*/

     public function wow ()
     {

         echo '<pre>';
         var_dump($_POST);
         die;

     }



    public function getPresent ()
     {   $allDataFromForm = array();
         $allDataFromForm  = $_POST;
         $presentArray = array();
         while ($checkbox = current($allDataFromForm)) {
             if ($checkbox == 'on')
             {
                 $presentKey = key($allDataFromForm);
                 $presentArray [] = $presentKey;
             }
             next($allDataFromForm);
         }
            return  $presentArray;
     }

    public function compare ()
    {

        $presentStudents = $_POST['student_id'];
        $presentedCheck = self::getPresent();

             foreach ($presentStudents as $presentStudent) {
             foreach ($presentedCheck as $cheked)
             {
                 if ($cheked == 'present_'.$presentStudent)
                 {
                     //echo $presentStudent." was ";
                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "School";

                     try {
                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                         // set the PDO error mode to exception
                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         $id_student = $presentStudent;
                         $datep = $_POST['datepickerp'];
                         $present = true;
                         $sql = "INSERT INTO present (id_student, datep, present)
                           VALUES ('$id_student', '$datep', '$present')";
                         // use exec() because no results are returned

                         $conn->exec($sql);
                         echo "New record created successfully";
                     }
                     catch(PDOException $e)
                     {
                         echo $sql . "<br>" . $e->getMessage();
                     }

                     $conn = null;
                 }
             }
         }
     }
}




/*if ($presentStudent = true)
{
    $datep = $_POST['datepickerp'];
    $present = $_POST['present'];
    $id_student = $_POST['student_id'.$i];

    $db = new PDO('mysql:host=localhost;dbname=School', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO present (id_student, present, datep) VALUES (:id_student, :present, :datep)";
    $db->exec("set names utf8");
    $query = $db->prepare($sql);
    //$query->execute(array(':id_student'=>$id_student, ':datep'=> $datep, ':present'=>$present));
    echo "yeeeeeaaaaaap";
}*/



