<?php

class post extends Controller {

    public function index() {
        $postmodel = $this->model("posts");
        $category = $postmodel->category();

        $this->view('post/index', [
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

        /* Sadece RAW json data alabiliyor.
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);
        */
        $data = json_decode($_POST['data'], true);

        $saveData = array(
            'author' => $data['author'],
            'categoryid' => $data['categoryid'],
            'title' => $data['title'],
            'message' => $data['message'],
            'text' => $data['text'],
            'created' => date('Y-m-d H:i:s', time()),
            'uploadedImageName' => $data['uploadImage']
        );

        $postModel = $this->model("posts");
        $model =   $postModel->kayit("posts", $saveData);

        if ($model['result'] < 1) {
            echo json_encode(["success" => 3, "message" => "Hiçbir post/resim kaydedilemedi."]);
            exit;
        }

        if (isset($_FILES["image"])) {
            $error  = false;
            $image  = $_FILES["image"];
            $code   = (int)$image["error"];
            $valid  = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $folder = PATH . "/views/blog/upload/";
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
}
