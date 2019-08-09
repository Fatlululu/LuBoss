<?php
use Phalcon\Mvc\Model;

class FatSysemAuth extends Model{

    public $id;

    public $name;

    public $status;

    public $createTme;

    public function initialize(){

    }

    public static function find($parameters = null){
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null){
        return parent::findFirst($parameters);
    }
}