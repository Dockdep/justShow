<?php

class rdsServices extends \Phalcon\Mvc\Model
{
    public $id;
    public $name;
    public $date;
    public $status;

    public function getSource()
    {
        return "rds_services";
    }

}