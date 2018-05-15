<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 11.05.2018
 * Time: 11:51
 */

require_once __DIR__.'/../boot.php';

class StudentLoader
{

    private $studentStorage;

    public function __construct(PdoStudentStorage $studentStorage)
    {
        $this->studentStorage = $studentStorage;
    }


    private function createStudentFromData($studentData)
    {
        $student = new Student;
        $student-> setId($studentData['id']);
        $student->setFormId($studentData['form_id']);
        $student->setName($studentData['name']);
        $student->setSurname($studentData['surname']);
        return $student;
    }

    public function getStudents()
    {
        $studentsData = $this->studentStorage->fetchAllStudentData();
        $students = array();
        foreach ($studentsData as $studentData){
            $students[] = $this->createStudentFromData($studentData);
        }
        return $students;
    }

    public function getStudentsById($form_id)
    {
        $formStudentsData = $this->studentStorage->fetchSingleStudentById($form_id);
        $formStudents = array();
        foreach ($formStudentsData as $formStudentData) {
            $formStudents[] = $this->createStudentFromData($formStudentData);
        }
        return $formStudents;
    }


        public function findStudentById ($id)
    {
        $studentArray = $this->studentStorage->fetchSingleStudentById($id);
        return $this->createStudentFromData($studentArray);
    }
}