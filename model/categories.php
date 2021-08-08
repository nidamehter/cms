<?php

class categories extends Model {
    public function getall() {
        $sql = "select * from category";
        $categories = parent::get($sql);
        return $categories;
    }

    function kayit($name, $data) {
        $query = parent::InsertQueryGenerator($name, json_encode($data));
        $results = parent::Insert($query);
        return $results;
    }


    public function deleteCategory($id) {
        $query = "DELETE FROM category where id=" . $id;
        return parent::Delete($query);
    }
}
