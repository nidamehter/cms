<?php

class blogs extends Model {
    public function getAllCategory() {
        $sql = "select * from category";
        $categories = parent::get($sql);
        return $categories;
    }

    public function getCategoryPost($url) {
        //Kategorinin SEO-url i hangi postun, kategori id sine denk geliyorsa onu getir.
        $sql = "SELECT * FROM posts,category WHERE category.caturl = '".$url."' and posts.categoryid = category.id";
        $posts = parent::get($sql);
        return $posts;
    }
}
