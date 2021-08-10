<?php

class blog extends Controller {
    public function index() {
        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();

        $this->view("blog/index", [
            "blogCategoryData" => $blogCategoryData['result']
        ]);
    }

    public function blogGetCategoryPost($url) {

        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();

        $blogData = $blogModel->getCategoryPost($url);

        $this->view("blog/index", [
            "blogData" => $blogData['result'],
            "blogCategoryData" => $blogCategoryData['result']
        ]);
    }
}
