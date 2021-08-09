<?php

class blog extends Controller {
    public function index() {
        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();


        $this->view("blog/index", [
            "blogCategoryData" => $blogCategoryData['result']
        ]);
    }

    public function blogGetCategoryPost($id) {

        $blogModel = $this->model("blogs");
        $blogCategoryData = $blogModel->getAllCategory();

        $blogData = $blogModel->getCategoryPost($id);

        $this->view("blog/index", [
            "blogData" => $blogData['result'],
            "blogCategoryData" => $blogCategoryData['result']
        ]);
    }
}
