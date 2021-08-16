<?php

class settings extends Model {
    public function getMenus() {
        $sql = "select * from menus";
        $menus = parent::get($sql);
        return $menus;
    }

    public function save($name, $data) {

        $query = parent::InsertQueryGenerator($name, json_encode($data));
        $results = parent::Insert($query);
        return $results;
    }

    public function updateMenu($name, $data, $title) {
        $query = UpdateQueryGeneratorMenu($name, json_encode($data), $title);
        $result = parent::get($query);
        return $result;
    }

    public function getTitle($title) {

        $query = "select * from menus where title=" . "'$title'";
        $result = parent::get($query);
        return $result;
    }
}
