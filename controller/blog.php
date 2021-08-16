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

        $this->view("blog/index", [
            "blogData" => $blogData['result'],
            "blogCategoryData" => $blogCategoryData['result'],
            "menus" => json_decode($menus['result'][0]["content"], JSON_FORCE_OBJECT)
        ]);
    }
}
