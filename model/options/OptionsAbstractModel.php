<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 27.06.16
 * Time: 16:17
 */
class OptionsAbstractModel extends Model
{
    
    const TABLE_LABLE  = 'tmpoptions';

    public function aAddNew($sTitle,$TABLE){
        $Elemnets = R::dispense($TABLE);
        $Elemnets->title = $sTitle;
        R::store($Elemnets);
    }

    public function aGetById($id,$TABLE){
        $Element = R::load($TABLE,$id);
        return $Element;
    }

    public function aGetAll($TABLE){
        $SQL = "SELECT * FROM ".$TABLE;
        $rows = R::getAll($SQL);
        $Elements = R::convertToBeans($TABLE, $rows);
        return $Elements;
    }

    public function aTrashAll($TABLE){
        $SQL = "SELECT * FROM ".$TABLE;
        $rows = R::getAll($SQL);
        $Elements = R::convertToBeans($TABLE, $rows);
        foreach ($Elements as $Element){
            R::trash($Element);
        }
    }
}