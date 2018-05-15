<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 14.05.2018
 * Time: 8:34
 */

require_once __DIR__.'/../boot.php0';



$container = new Container($configuration);
$schoolLoader = $container->getSchoolLoader();
$schools=$schoolLoader->getSchools();

$formLoader = $container->getFormLoader();
$forms=$formLoader->getForms();

$studentLoader = $container->getStudentLoader();
$students=$studentLoader->getStudents();


function schoolId()
{

};