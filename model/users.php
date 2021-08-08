<?php

class users extends Model {

    function addUser($table, $data) {
        $query = parent::InsertQueryGenerator($table, json_encode($data));
        $results = parent::Insert($query);
        return $results;
    }

    public function listAll() {
        $query = 'select * from users';
        $list = parent::get($query);
        return $list;
    }

    public function login($data) {
        $query = 'select email, passwords from users where email="' . $data['email'] . '" and passwords="' . $data['passwords'] . '";';
        $user = parent::get($query);
        return $user;
    }
    
    public function deleteUser($id){
        $query = "DELETE FROM users where id=" . $id;
        return parent::Delete($query);
    }

}
