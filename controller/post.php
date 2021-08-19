<?php

class post extends Controller {

    public function index() {
        $postmodel = $this->model("posts");
        $category = $postmodel->category();

        $this->view('post/postAdd', [
            "categories" => $category["result"]
        ]);
    }

    function postList() {

        $postmodel = $this->model("posts");
        $posts = $postmodel->getAll();

        $this->view('post/postList', [
            "posts" => $posts["result"]
        ]);
    }

    function kaydet() {

        $data = json_decode($_POST['data'], true);

        $saveData = array(
            'author' => $data['author'],
            'categoryid' => $data['categoryid'],
            'title' => $data['title'],
            'message' => $data['message'],
            'text' =>  htmlentities($data['text'], ENT_QUOTES, "UTF-8"),  //ENTITY ENCODE
            'created' => date('Y-m-d H:i:s', time()),
            'uploadedImageName' => $data['uploadImage']
        );

        $postModel = $this->model("posts");
        $model =   $postModel->kayit("posts", $saveData);


        if ($model['result'] < 1) {
            echo json_encode(["success" => 3, "message" => "Hiçbir post/resim kaydedilemedi."]);
            exit;
        }

        $result = imageSave('image');

        if ($result == 1) {
            echo json_encode(["success" => 1, "message" => "Yükleme başarılı"]);
        } else {
            echo json_encode(["success" => 2, "message" => "Post verileri veri tabanına eklendi fakat resim eklenemedi!", "error" => 1]);
        }
    }


    function edit($id) {

        $postmodel = $this->model("posts");
        $posts = $postmodel->getOneRecord($id);
        //$posts["result"][0]['text']  =  html_entity_decode($posts["result"][0]['text'], ENT_QUOTES, "UTF-8");

        $category = $postmodel->category();

        $this->view('post/postAdd', [
            "post" => json_encode($posts["result"], JSON_UNESCAPED_UNICODE),
            "categories" => $category["result"]
        ]);
    }

    function editSubmit() {

        $editedData = json_decode($_POST['data'], true);
        $reqData = $editedData[0];

        $id = $reqData['id'];
        $data = [
            'author' => $reqData['author'],
            'categoryid' => $reqData['categoryid'],
            'title' => $reqData['title'],
            'message' => $reqData['message'],
            'text' => htmlentities($reqData['text'], ENT_QUOTES, "UTF-8"),  //ENTITY ENCODE
            'created' => date('Y-m-d H:i:s', time()),
        ];

    
        //Eğer düzenleme yaparken fazladan resim gelmişse updateliyoruz
        if (isset($editedData[1])) {
            $data['uploadedImageName'] =  $editedData[1]['uploadImage'];
        }

        //Eğer gelen post verisinde $_FILES['image'] varsa kaydediyoruz.
        $imageResult = imageSave('image');

        $tableName = "posts";
        $userModel = $this->model("posts");
        $editResult = $userModel->editPosts($tableName, $data, $id);

        if ($imageResult == 1 && $editResult["success"] == true) {
            echo json_encode(["success" => 1, "message" => "Düzenleme Başarılı", "error" => 0]);
        } else if ($imageResult == 2) {
            echo json_encode(["success" => 2, "message" => "Resim eklemede eksik olabilir!", "error" => 1]);
        } else if ($editResult["message"] < 1) {
            echo json_encode(["success" => 3, "message" => "Düzenlemede hata!", "error" => 1]);
        }
    }

    function delete($id) {
        $userModel = $this->model("posts");
        $results = $userModel->deletePost($id);
        header("Location: /cms/admin/postList");
    }
}
