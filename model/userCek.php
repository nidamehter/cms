<?php
class userCek extends Model {

  public function users() {
    $query = 'select email,passwords from user where email="' . $_SESSION['email'] . '" and passwords="' . $_SESSION['passwords'] . '"';
    $user = parent::get($query);
    return $user;
  }

  public function login($data) {
    $query = 'select email, passwords from users where email="' . $data['email'] . '" and passwords="' . $data['passwords'] . '";';
    $user = parent::get($query);
   
    return $user;
  }

  public function signup($name, $data) {

    $query = parent::InsertQueryGenerator($name, json_encode($data));
    $insertException = parent::insert($query);
    return $insertException;
  }

  /*public function login($data)
  {
    $_SESSION['login'] = true;
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];
  }*/
}
