<?php

class setting extends Controller {

    public function index() {
        if (isset($_POST['submit'])) {
            $html = '<?php' . PHP_EOL . PHP_EOL;

            if (isset($_POST['submit'])) {

                foreach (sPost('setting') as $key => $value) {
                    $html .= '$setting["' . $key . '"] = "' . $value . '";' . PHP_EOL;
                }
                file_put_contents(PATH . "/siteSettings.php", $html);
                header("Location: /cms/admin/Ayar");
            }
        }

        $menusModel = $this->model("settings");
        $menus = $menusModel->getMenus()['result'];
        /*
        foreach($menus as $key => $value){
        
            $menus[$key]['content'] =  json_decode($value['content'], JSON_FORCE_OBJECT);

        }
*/

        $this->view("ayarlar/index", [
            'menus' => $menus,
        ]);
    }

    function test() {
        $this->view("ayarlar/test");
    }

    function ayarBlog() {
        /* Sadece RAW json data alabiliyor.*/
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);


        $saveData = [
            'title' => $data['title'],
            'content' =>  json_encode($data['content'], JSON_UNESCAPED_UNICODE)
        ];

        $menusModel = $this->model("settings");

        $title = $saveData['title'];
        $menuRes = $menusModel->getTitle($title);


        if (empty($menuRes['result'])) {
            $menusResponse = $menusModel->save("menus", $saveData);
        } else {
            $menusResponse = $menusModel->updateMenu("menus", $saveData, $title);
        }


        if ($menusResponse['result'] < 1) {
            echo json_encode(['success' => 0, 'message' => "Giriş Başarısız!", 'results' => ""]);
        }else{
            echo json_encode(['success' => 1, 'message' => "Menü Girişi Başarılı!", 'results' => $menusResponse]);
        }


    }
}
