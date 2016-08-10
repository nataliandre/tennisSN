<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 27.06.16
 * Time: 14:02
 */
class TShortSizeModel extends OptionsAbstractModel
{
    const TABLE_LABLE = "tbltshortsize";

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