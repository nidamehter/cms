<?php

class blogs extends Model {
    public function getAllCategory() {
        $sql = "select * from category";
        $categories = parent::get($sql);
        return $categories;
    }

    public function getCategoryPost($id) {
        $sql = "select * from posts where categoryid=".$id;
        $posts = parent::get($sql);
        return $posts;
    }
}
