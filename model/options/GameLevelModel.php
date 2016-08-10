<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 28.06.16
 * Time: 08:45
 */
class GameLevelModel extends OptionsAbstractModel
{
    const TABLE_LABLE = "tblgamelevel";

    public function addNew($sTitle)
    {
        return $this->aAddNew($sTitle,self::TABLE_LABLE);
    }

    public function getById($id)
    {
        return $this->aGetById($id,self::TABLE_LABLE);
    }

    public function getAll()
    {
        return $this->aGetAll(self::TABLE_LABLE);
    }

    public function trashAll()
    {
        return $this->aGetAll(self::TABLE_LABLE);
    }


}