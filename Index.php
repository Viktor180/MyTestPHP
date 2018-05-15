<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 09.05.2018
 * Time: 14:32
 */
require __DIR__.'/boot.php';

$container = new Container($configuration);
$schoolLoader = $container->getSchoolLoader();
$schools=$schoolLoader->getSchools();

$formLoader = $container->getFormLoader();
$forms=$formLoader->getForms();
$singleForms=$formLoader->getSchoolForms($school_id);

$studentLoader = $container->getStudentLoader();
$students=$studentLoader->getStudents();
$singleStudents=$studentLoader->getStudentsById($form_id);

?>
<html>
<head>
        <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Lista Obecnosci</title>
           <!-- Bootstrap -->
           <link href="css/Style.css" rel="stylesheet">
           <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

           <![endif]-->
    </head>
    <header>
        <div>
        Lista Obecnosci
        </div>
    </header>

    <section>




        <form action="/lib/Present.php" method ="POST">
        <table>
            <tr><input  type="date" </tr>
            <?php foreach ($schools as $school):?>
            <tr>
                <td colspan="4"><?php echo $school->getName(); ?>
                    <?php $school_id=$school->getId();
                    $singleForms=$formLoader->getSchoolForms($school_id);
                    ;?>
                </td>
            </tr>
            <?php foreach ($singleForms as $form): ?>
            <tr>
                <td colspan="4">
                    <?php echo $form->getNumber();?>
                    <?php $form_id = $form->getId();?>
                </td>
            </tr>
            <?php $singleStudents=$studentLoader->getStudentsById($form_id); ?>
                <?php foreach ($singleStudents as $student):?>
            <tr>
                <td><?php echo $student->getName(); ?></td>
                <td><?php echo $student->getSurname(); ?></td>
                <td><?php echo $student->getId(); ?></td>
                <td><input type="checkbox"></td>
            </tr>
            <?php endforeach; endforeach; endforeach; ?>
        </table>
            <button type="submit" style=" height: 50px;width: 50px;background-color: #4cae4c"></button>
        </form>



    </section>

</html>