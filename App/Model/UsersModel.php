<?php

namespace App\Model;

use Core\Model\Model;

class UsersModel extends Model
{
 protected $table = 'users';
 
  public function login($login, $pass){
        $user = $this->db->prepare("SELECT
				* FROM users WHERE username = ?
		", [$login], true);
        if($user){
            if($user->password == sha1($pass)){
                $_SESSION['user'] = $user;
                setcookie('Thewayshop_user_id', $user->id, time() + 3600, '/');
                return true;
            }
        } else {
            return false;
        }
    }	
    
    public function find($id)
	{
		return $this->query("SELECT
				* FROM users where id = ?", [$id], true);
	}
    
    public function checkusers($username)
	{
		return $this->query("select * from users where username='" . $username . "'");
	}
}