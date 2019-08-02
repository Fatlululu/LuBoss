<?php
use Phalcon\Mvc\Model;

class FatAdminUser extends Model{

    public $id;

    public $adminUser;

    public $name;

    public $password;

    public $logNumber;

    public $createTime;

    public function initialize(){

    }

    public function find($parameters = null){
        return parent::find($parameters);
    }

    public function findFirst($parameters = null){
        return parent::findFirst($parameters);
    }

}