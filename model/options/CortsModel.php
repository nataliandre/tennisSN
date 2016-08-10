<?php


class CortsModel extends Model
{

    private $_CortsArray = [
        '0' => 'Грунт',
        '1' => 'Хард',
        '2' => 'С ковровым покрытием'
    ];

    public function getCortsArray()
    {
        return $this->_CortsArray;
    }

    public function getCortFromArray($cortId)
    {
        return $this->_CortsArray[$cortId];
    }


}