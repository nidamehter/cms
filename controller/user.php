<?php

class  user extends Controller
{
    public function index()
    {
        $this->view('user/index');
  
    }

    function addUser() {
        $postdata = file_get_contents("php://input");
        $reqData = json_decode($postdata, true);

        $data = [
            'name' => $reqData['name'],
            'password' => $reqData['pass'],
            'email' => $reqData['mail'],
            'role' => $reqData['role'],
            'active' => $reqData['active']
        ];

        $tableName = "users";
        $addUserModel = $this->model("users");
        $results = $addUserModel->addUser($tableName, $data);
        echo json_encode((object)$results);
    }

}

?>