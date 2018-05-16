<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 16.05.2018
 * Time: 8:25
 */

class PresentStudent
{

    private $id_student;

    private $date;

    private $present;

    /**
     * @return mixed
     */
    public function getIdStudent()
    {
        return $this->id_student;
    }

    /**
     * @param mixed $id_student
     */
    public function setIdStudent($id_student)
    {
        $this->id_student = $id_student;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPresent()
    {
        return $this->present;
    }

    /**
     * @param mixed $present
     */
    public function setPresent($present)
    {
        $this->present = $present;
    }


}