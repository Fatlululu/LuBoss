<?php
use Phalcon\Mvc\Model;

class FatSysemLog extends  Model{

    public function initialize(){

    }

    public static function find($parameters = null){
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null){
        return parent::findFirst($parameters);
    }
}