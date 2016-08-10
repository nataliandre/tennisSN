<?php



class GameResultsFilter
{

    public static function filterResultsById($Games)
    {
        $SortedGames = array();
        foreach ($Games as $Game)
        {
            array_push($SortedGames,$Game->id);
        }

        return $SortedGames;
    }

}