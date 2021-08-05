<?php

class settings extends Controller {

    public function index(){
/*
        if(isset($_POST['submit'])){
            $html = '<?php'.PHP_EOL.PHP_EOL;

            if(isset($_POST['submit'])){

                foreach (sPost('setting') as $key => $value){
                    $html .= '$setting["'.$key.'"] = "'.$value.'";'.PHP_EOL;
                }
                file_put_contents(PATH ."/views/public/siteSettings.php", $html);
                header("Location: /");

            }
        }*/
        
        echo $_POST['submit'];
        $this->view("ayarlar/index");
    }
}