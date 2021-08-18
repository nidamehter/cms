<?php

class category extends Controller {
    public function index() {
        $this->view('category/categoryAdd');
    }

    public function list() {
        $categoryModel = $this->model("categories");
        $res = $categoryModel->getall();
        $this->view('category/categoryList', ["categories" => $res["result"]]);
    }

    public function add() {

        $reqdata = json_decode($_POST['data'], true);
        //Eğer SEO-url girilmemişse, kategorinin adını SEO-url e çevir, aynı zamanda categoryUrl( SEO-url ) farklı bir formatta girilmişse onu da slugit ile SEO-url e çevir.
        if ("" == $reqdata['VcategoryUrl']) {
            $reqdata['VcategoryUrl'] = slugit($reqdata['VcategoryName']);
        } else {
            $reqdata['VcategoryUrl'] = slugit($reqdata['VcategoryUrl']);
        }


        $data = array(
            'name' => $reqdata['VcategoryName'],
            'caturl' => $reqdata['VcategoryUrl'],
            'description' => $reqdata['VcategoryDescription'],
            'active' => $reqdata['VcategoryActive'],
            'image' => $reqdata['uploadImage']
        );

        $catModel = $this->model("categories");
        $res =  $catModel->kayit("category", $data);

        if ($res['result'] < 1) {
            echo json_encode(["success" => 3, "message" => "Hiçbir post/resim kaydedilemedi."]);
            exit;
        }

        if (isset($_FILES["image"])) {
            $error  = false;
            $image  = $_FILES["image"];
            $code   = (int)$image["error"];
            $valid  = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $folder = PATH . "/views/blog/upload/category/";
            $target = $folder . $image["name"];

            if (!file_exists($folder)) {
                @mkdir($folder, 0755, true);
            }

            if ($code !== UPLOAD_ERR_OK) {
                switch ($code) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error  = 'Error ' . $code . ': Dosya boyutu php.ini deki belirtilen değerleri aşıyor: <a href="http://www.php.net/manual/en/ini.core.php#ini.upload-max-filesize" target="_blank" rel="nofollow"><span class="function-string">upload_max_filesize</span></a>';
                        break;
                    default:
                        $error  = 'Error ' . $code . ': Bilinmeyen yükleme hatası';
                        break;
                }
            } else {
                $iminfo = @getimagesize($image["tmp_name"]);

                if ($iminfo && is_array($iminfo)) {
                    if (isset($iminfo[2]) && in_array($iminfo[2], $valid) && is_readable($image["tmp_name"])) {


                        if (!move_uploaded_file($image["tmp_name"], $target)) {
                            $error  = "Upload edilmiş dosya taşınırken hata!";
                        }
                    } else {
                        $error  = "Resim dosyası okunamıyor veya geçersiz format";
                    }
                } else {
                    $error  = "Sadece şu formatlar: jpg, gif, png, ...";
                }
            }
            if (empty($error)) {

                if ($iminfo[0] > 800 && $iminfo[1] > 600) {
                    imageTransform($target, $target, [900, 600, false, 0, 100]);
                }
                echo json_encode(["success" => 1, "message" => "Yükleme başarılı"]);
                exit;
            } else {
                echo json_encode(["success" => 2, "message" => "Post verileri veri tabanına eklendi fakat resim eklenemedi!", "error" => $error]);
                exit;
            }
        }
    }
 
    function edit($id)
    {

       $catModel = $this->model('categories');
            $category = $catModel->getCategoryById($id);

            $this->view(
                'category/categoryAdd',
                [
                    "category" => json_encode($category["result"],JSON_UNESCAPED_UNICODE),
                    "edit" =>  1
                ]
            );          
    }
    public function editSubmit(){

        $postdata = file_get_contents("php://input");
        $catdata = json_decode($postdata, true);


        $id= $catdata ['id'];
        $data = [
            'name' =>  $catdata ['name'],
            'caturl' =>  $catdata ['caturl'],
            'description' =>  $catdata ['description'],
            'active' =>  $catdata ['active']
        ];

        $tableName = "category";
        $userModel = $this->model("categories");
        $results = $userModel->editCategory($tableName, $data, $id);
        echo json_encode((object)$results);

}


    function delete($id) {
        $userModel = $this->model("categories");
        $results = $userModel->deleteCategory($id);
        header("Location: /cms/admin/categoryList");
    }
}
