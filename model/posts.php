<?php

class posts extends Model {
  public function getAll() {
    $sqlrecord = "select * from posts";
    $updateproduct = parent::get($sqlrecord);
    return $updateproduct;
  }

  function kayit($name, $data) {
    $query = parent::InsertQueryGenerator($name, json_encode($data));
    $results = parent::Insert($query);
    return $results;
  }

  public function getOneRecord($id = '') {
    $sqlrecord = "select * from posts where id=" . $id;
    $updateproduct = parent::get($sqlrecord);
    return $updateproduct;
  }

  public function category() {
    $query = "select id,name from category";
    $categories = parent::get($query);
    return $categories;
  }
}
