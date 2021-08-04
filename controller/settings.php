<?php

class settings extends Controller {

    public function index(){
/*        $html = '<?php'.PHP_EOL.PHP_EOL;

        if(isset($_POST['submit'])){
            foreach (sPost('settings') as $key => $value){
                $html .= '$settings["'.$key.'"] = "'.$value.'";'.PHP_EOL;
            }
            file_put_contents("siteSettings.php", $html);
        }
*/  
        if(isset($POST['submit'])){
            print_r($POST);
        }
        
        $this->view("ayarlar/index");
    }
}