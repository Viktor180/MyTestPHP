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
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/obecnosc/css/Style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $(function() {
                    var currentDate = new Date();
                    $('#datepicker').datepicker({
                        inline: true,
                        showOtherMonths: true,
                        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        dateFormat: 'yy-mm-dd'
                    });
                    $("#datepicker").datepicker("setDate", currentDate,);
                });
            </script>

           <![endif]-->
    </head>
    <header>
        <section top>
            <wrapper>
                <row>
                    <col-md-12 id="table_header">
                        Lista Obecnosci
                    </col-md-12>
                </row>
            </wrapper>
         </section>
    </header>

    <section table_body>
        <wrapper>
            <row>
                <col-md-12 id="table">
                    <form action="present.php" method ="POST">
                        <table>
                            <tr><input type="text" id="datepicker" name="datepickerp"> </tr>
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
                                            <td><?php echo $student->getId(); ?>
                                                <input type="hidden" id ="student_id_<?php echo $student->getID();?>"  name="student_id[]" value='<?php echo $student->getId(); ?>'>
                                            </td><?php ?>
                                            <td><input type="checkbox" id="present<?php echo $student->getId();?>" name="present_<?php echo $student->getId();?>"></td>

                                        </tr>
                                    <?php
                                    endforeach; endforeach; endforeach; ?>

                        </table>

                        <button type="submit" style=" height: 50px;width: 50px;background-color: #4cae4c"></button>

                    </form>
                </col-md-12>
            </row>
        </wrapper>



    </section>

</html>