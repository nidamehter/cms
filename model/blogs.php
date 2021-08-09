<?php

class blogs extends Model {

    public function getall() {
        $sql = "select * from posts";
        $categories = parent::get($sql);
        return $categories;
    }
}
