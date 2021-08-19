<?php

class blog extends Controller {
    public function index() {
        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();

        $menuModel = $this->model("settings");
        $menus = $menuModel->getMenus();

        $this->view("blog/index", [
            "blogCategoryData" => $blogCategoryData['result'],
            "menus" => json_decode($menus['result'][0]["content"], JSON_FORCE_OBJECT)
        ]);
    }


    public function blogGetCategoryPost($url) {

        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();

        $menuModel = $this->model("settings");
        $menus = $menuModel->getMenus();

        $blogData = $blogModel->getCategoryPost($url);

        //ENTITY DECODE
        foreach($blogData['result'] as $key => $value){
            $blogData['result'][$key]['text'] =  html_entity_decode( $value['text'], ENT_QUOTES, "UTF-8");
        }


        $this->view("blog/index", [
            "blogData" => $blogData['result'],
            "blogCategoryData" => $blogCategoryData['result'],
            "menus" => json_decode($menus['result'][0]["content"], JSON_FORCE_OBJECT)
        ]);
    }
}
