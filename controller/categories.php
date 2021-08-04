<?php

class  categories extends Controller
{
    public function index()
    {
        $catmodel = $this->model("category");
        $categories = $catmodel->getall();
        $this->view('categories/index', [
            'kategoriler' => $categories
        ]);
    }
}

?>