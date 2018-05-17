<?php
/**
 * Created by PhpStorm.
 * User: sub
 * Date: 10.05.2018
 * Time: 13:44
 */


require_once __DIR__ .'/../boot.php';

class Container
{

    private $pdo;

    private $configuration;

    private $schoolStorage;

    private $schoolLoader;

    private $formStorage;

    private $formLoader;

    private $studentStorage;

    private $studentLoader;

    private $presentStorage;

    private $presentLoader;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return PDO
     */
    public function getPDO()
    {
        if ($this-> pdo === null)
        {
            $this-> pdo = new PDO (
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }




    /**
     * @return SchoolLoader
     */
    public function getSchoolLoader()
    {
        if ($this->schoolLoader === null) {
            $this->schoolLoader = new SchoolLoader($this->getSchoolStorage());
        }
        return $this->schoolLoader;
    }



    /**
     * @return PdoSchoolStorage
     */
    public function getSchoolStorage()
    {
        if ($this->schoolStorage === null) {
            $this->schoolStorage = new PdoSchoolStorage($this->getPDO());
        }
        return $this->schoolStorage;

    }

    /**
     * @return mixed
     */
    public function getFormLoader()
    {
        if($this->formLoader === null){
            $this->formLoader = new FormLoader($this->getFormStorage());
        }
        return $this->formLoader;
    }

    /**
     * @return mixed
     */
    public function getFormStorage(){
        if($this->formStorage === null){
            $this->formStorage = new PdoFormStorage($this->getPDO());
        }
        return $this->formStorage;
    }

    /**
     * @return mixed
     */
    public function getStudentLoader()
    {
        if($this->studentLoader === null){
            $this->studentLoader = new StudentLoader($this->getStudentStorage());
        }
        return $this->studentLoader;
    }

    /**
     * @return mixed
     */
    public function getStudentStorage(){
        if($this->studentStorage === null){
            $this->studentStorage = new PdoStudentStorage($this->getPDO());
        }
        return $this->studentStorage;
    }

    /**
     * @return mixed
     */
    public function getPresentLoader()
    {
        if($this->presentLoader === null){
            $this->presentLoader = new PresentLoader($this->getPresentStorage());
        }
        return $this->presentLoader;
    }

    /**
     * @return mixed
     */
    public function getPresentStorage(){
        if($this->presentStorage === null){
            $this->presentStorage = new PdoPresentStorage($this->getPDO());
        }
        return $this->presentStorage;
    }


}