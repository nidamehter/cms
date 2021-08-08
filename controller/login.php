<?php

class login extends Controller {

    public function index() {
        $this->view('login/index');
    }

    public function loginSubmit() {
        $methodresult = [];
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);

        if (strlen($data['mail']) > 0) {

            $data = array(
                'email' => $data['mail'],
                'passwords' => $data['pass'],
            );
        } else {
            $methodresult = [
                'success' => false,
                'message' => "Email eksik",
                'result' => null
            ];
            echo json_encode($methodresult);
            exit;
        }

        $login = $this->model("users");
        $methodresult = $login->login($data);

        echo json_encode($methodresult);
    }
}
