<?php

class products extends Model {
    public function getall() {
        $sql = "select * from products";
        $product = parent::get($sql);
        return $product;
    }
}
