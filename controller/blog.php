<?php

class blog extends Controller

{
    public function index()
    {
        
        $blogModel = $this->model("blogCek");
        $blogData = $blogModel->getall();

        $this->view("blog/index", [
            "blogData" => $blogData['result']
        ]);

    }


}



?>