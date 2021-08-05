<?php

class  post extends Controller {

    public function index() {
        $this->view('post/index');
    }

    public function postResimKaydet() {

        if (isset($_FILES["image"])) {
            $error  = false;
            $image  = $_FILES["image"];
            $code   = (int)$image["error"];
            $valid  = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $folder = dirname(__FILE__) . "/upload/";
            $target = $folder . $image["name"];

            if (!file_exists($folder)) {
                @mkdir($folder, 0755, true);
            }

            if ($code !== UPLOAD_ERR_OK) {
                switch ($code) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error  = 'Error ' . $code . ': Dosya boyutu php.ini deki belirtilen değerleri aşıyor: <a href="http://www.php.net/manual/en/ini.core.php#ini.upload-max-filesize" target="_blank" rel="nofollow"><span class="function-string">upload_max_filesize</span></a>';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error  = 'Error ' . $code . ': Yüklenen dosya, HTML formunda belirtilen <span class="const-string">MAX_FILE_SIZE</span> yönergesini aşıyor';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $error  = 'Error ' . $code . ': Dosyanın yalnızca bir kısmı yüklendi';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $error  = 'Error ' . $code . ': Dosya Yok';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $error  = 'Error ' . $code . ': Geçici dizin  yok';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $error  = 'Error ' . $code . ': Diske Yazma Hatası';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $error  = 'Error ' . $code . ': Dosya yüklenirken PHP uzantısı durdu';
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
                echo json_encode(array("error" => 0, "message" => "Yükleme başarılı"));
            } else {
                echo json_encode(array("error" => 1, "message" => $error));
            }
        }
    }

    function postVeriKaydet() {
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);

        $data = array(
            'author' => $data['post']['author'],
            'categoryname' => $data['post']['categoryname'],
            'title' => $data['post']['title'],
            'message' => $data['post']['message'],
            'text' => $data['post']['text'],
            'created' => date('Y-m-d H:i:s', time())
        );


        $postModel = $this->model("posts");
        $model =   $postModel->kayit("posts", $data);
        echo json_encode($model);
    }
}
