<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 11.05.2018
 * Time: 11:12
 */

require_once __DIR__.'/../boot.php';

class FormLoader
{

    private $formStorage;

    public function __construct(PdoFormStorage $formStorage)
    {
        $this->formStorage = $formStorage;
    }

    public function createFormFromData(array $formData)
    {
        $form = new Form;
        $form->setId($formData['id']);
        $form->setNumber($formData['number']);
        $form->setSchoolId($formData['school_id']);
        return $form;
    }


    public function getForms()
    {
        $formsData = $this->formStorage->fetchAllFormData();
        $forms = array();
        foreach ($formsData as $formData) {
            $forms[] = $this->createFormFromData($formData);
        }
        return $forms;

    }

    public function getSchoolForms($school_id)
    {
        $schoolFormsData=$this->formStorage->fetchSingleFormData($school_id);
        $schoolForms = array();

        foreach ($schoolFormsData as $schoolFormData)
        {
            $schoolForms[] = $this->createFormFromData($schoolFormData);
        }
        return $schoolForms;

    }

    public function getFormById ($school_id){
        $formArray = $this->formStorage->fetchSingleFormData($school_id);
        return $this->createFormFromData($formArray);
    }
}