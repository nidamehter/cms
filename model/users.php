<?php

class users extends Model {

    function addUser($table, $data){
        $query = parent::InsertQueryGenerator($table, json_encode($data));
        $results = parent::Insert($query);
        return $results;
    }

}