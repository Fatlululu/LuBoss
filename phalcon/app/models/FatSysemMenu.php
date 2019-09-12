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

    /**
     *
     * @param $aId 角色ID
     * @return mixed
     */
    public static function getNav($aId){
        if($aId == 0){
            $navList = parent::find(['conditions' => 'pId = 0'])->toArray();
        }
        return $navList;
    }

    public static function getMenu($aId,$navList){
        if(empty($navList)){
            return "数据有误，请稍后再试";
        }
        $menuList = [];
        foreach ($navList as $k => $v){
            $firstMenu = parent::find([
                'condition' => "pId = ".$v['id']."",
                'columns'   => "id,pId,title,icon,href,spread"
            ])->toArray();
            if($aId == 0){
                if(empty($firstMenu)){
                    $menuList[$v['id']] = [];
                }else{
                    foreach ($firstMenu as $kf => $vf){
                        $menuList[$v['id']][$kf] = $vf;
                        $secondMenu = parent::find([
                            'condition' => "pId = ".$vf['id']."",
                            'columns'   => "id,pId,title,icon,href,spread"
                        ]);
//                        foreach ()

                    }
                }
            }

        }
    }

}