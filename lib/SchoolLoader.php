<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 10.05.2018
 * Time: 14:41
 */

require_once __DIR__.'/../boot.php';


class SchoolLoader
{

    private $schoolStorage;

    public function __construct(PdoSchoolStorage $schoolStorage)
    {
        $this->schoolStorage = $schoolStorage;
    }

    public function createSchoolFromData(array $schoolData)
    {
        $school = new School();
        $school->setID($schoolData['id']);
        $school->setName($schoolData['name']);
        $school->setNumber($schoolData['number']);
        return $school;
    }


    public function getSchools()
    {
        $schoolsData = $this->schoolStorage->fetchAllSchoolData();
        $schools = array();
        foreach ($schoolsData as $schoolData) {
            $schools[] = $this->createSchoolFromData($schoolData);
        }
        return $schools;
    }



    public function findSchoolId($id)
    {
        $schoolArray = $this->schoolStorage->fetchSingleSchoolData($id);
        return $this->createSchoolFromData($schoolArray);
    }
}