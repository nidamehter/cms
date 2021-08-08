<?php

class user extends Controller {

    public function index() {
        $this->view('user/userAdd');
    }

    public function userList() {
        $userModel = $this->model('users');
        $res = $userModel->listAll();
        $this->view('user/userList',["users" => $res["result"]]);
    }

    function add() {
        $postdata = file_get_contents("php://input");
        $reqData = json_decode($postdata, true);

        $data = [
            'name' => $reqData['name'],
            'passwords' => $reqData['pass'],
            'email' => $reqData['mail'],
            'role' => $reqData['role'],
            'active' => $reqData['active']
        ];

        $tableName = "users";
        $userModel = $this->model("users");
        $results = $userModel->addUser($tableName, $data);
        echo json_encode((object)$results);
    }

    function edit() {
        
    }

    function delete($id) {
        $userModel = $this->model("users");
        $results = $userModel->deleteUser($id);
        header("Location: /cms/admin/userList");
    }
}
