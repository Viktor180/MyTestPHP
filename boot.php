<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 09.05.2018
 * Time: 15:35
 */
require_once  __DIR__.'/lib/Student.php';
require_once  __DIR__.'/lib/School.php';
require_once __DIR__ . '/lib/Container.php';
require_once  __DIR__.'/lib/SchoolLoader.php';
require_once __DIR__ . '/lib/Form.php';
require_once __DIR__ . '/lib/PdoSchoolStorage.php';
require_once  __DIR__.'/lib/FormLoader.php';
require_once __DIR__ . '/lib/PdoFormStorage.php';
require_once  __DIR__.'/lib/StudentLoader.php';
require_once __DIR__ . '/lib/PdoStudentStorage.php';
require_once  __DIR__.'/lib/PresentLoader.php';
require_once __DIR__ . '/lib/PdoPresentStorage.php';
require_once __DIR__.'/lib/PresentStudent.php';
require_once __DIR__.'/lib/Present.php';


    $configuration = array (
    'db_dsn' => 'mysql:host=localhost;dbname=School',
    'db_user' => 'root',
    'db_pass' => ''

);