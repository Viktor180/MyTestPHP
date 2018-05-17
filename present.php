<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 16.05.2018
 * Time: 11:07
 */


require_once __DIR__.'/boot.php';
$container = new Container($configuration);

$present = new Present();

//$presentStudent = $present->wow();

//$show = $present->compare();

$presents = $present->handlePost();




