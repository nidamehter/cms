<?php

class user extends Controller
{

    public function index()
    {
        $this->view('user/userAdd');
    }

    public function userList()
    {
        $userModel = $this->model('users');
        $res = $userModel->listAll();
        $this->view('user/userList', ["users" => $res["result"]]);
    }

    function add()
    {
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

    function edit($id)
    {
       
            $userModel = $this->model('users');
            $user = $userModel->getUserById($id);
            $this->view(
                'user/userAdd',
                [
                    "user" =>  json_encode($user["result"]),
                    "edit" =>  1

                ]
            );
            
        
    }

    public function editSubmit(){

            $postdata = file_get_contents("php://input");
            $reqData = json_decode($postdata, true);

            $id=$reqData['id'];
            $data = [
                'name' => $reqData['name'],
                'passwords' => $reqData['pass'],
                'email' => $reqData['mail'],
                'role' => $reqData['role'],
                'active' => $reqData['active']
            ];

            $tableName = "users";
            $userModel = $this->model("users");
            $results = $userModel->editUser($tableName, $data, $id);
            echo json_encode((object)$results);
        


    }

    function delete($id)
    {
        $userModel = $this->model("users");
        $results = $userModel->deleteUser($id);
        header("Location: /cms/admin/userList");
    }
}
