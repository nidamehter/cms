<?php

class settings extends Controller {

    public function index() {

        $this->view("ayarlar/index");
    }

    public function save() {
        if (isset($_POST['submit'])) {
            $html = '<?php' . PHP_EOL . PHP_EOL;

            if (isset($_POST['submit'])) {

                foreach (sPost('setting') as $key => $value) {
                    $html .= '$setting["' . $key . '"] = "' . $value . '";' . PHP_EOL;
                }
                file_put_contents(PATH . "/siteSettings.php", $html);
                header("Location: /cms/Ayar");
            }
        }
    }
}
