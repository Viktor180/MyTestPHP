<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 14.05.2018
 * Time: 11:56
 */
require_once __DIR__ . '/../boot.php';

/**
 * Class PresentLoader
 */
class PresentLoader
{
    private $presentStorage;

    public function __construct(PdoPresentStorage $presentStorage)
    {
        $this->presentStorage = $presentStorage;
    }

    public function createSchoolFromData(array $presentData)
    {
        $present = new Present();
        $present->setID($presentData['id']);
        $present->setName($presentData['name']);
        $present->setNumber($presentData['number']);
        return $present;
    }


    public function getPresents()
    {
        $presentsData = $this->presentStorage->fetchAllpresentData();
        $presents = array();
        foreach ($presentsData as $presentData) {
            $presents[] = $this->createPresentFromData($presentData);
        }
        return $presents;
    }


    public function findSchoolId($id)
    {
        $presentArray = $this->presentStorage->fetchSinglePresentData($id);
        return $this->createPresentFromData($presentArray);
    }
}