<?php

class  post extends Controller
{

    public function index()
    {
        $this->view('post/index');
    }


    public function kaydet()
    {
       
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);

       
            $data = array(
                'author' => $data['post']['author'],
                'categoryname' => $data['post']['categoryname'],
                'title' => $data['post']['title'],
                'message' => $data['post']['message'],
                'text' => $data['post']['text'],
                'created'=>date('Y-m-d H:i:s', time())
            );
  
        print_r($data);
            
        $postModel = $this->model("posts");
        $model =   $postModel->kayit("posts", $data);
        echo json_encode($model);
   

        
    }






















}

?>