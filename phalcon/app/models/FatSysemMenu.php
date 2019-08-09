<?php
use Phalcon\Mvc\Model;

class FatSysemMenu extends Model{

    public $id;

    public $pId;

    public $title;

    public $createId;

    public $icon;

    public $href;

    public $spread;

    public $sort;

    public $createTime;

    public function initialize(){

    }

    public static function find($parameters = null){
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null){
        return parent::findFirst($parameters);
    }
}