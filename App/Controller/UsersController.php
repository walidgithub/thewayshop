<?php

namespace App\Controller;

class UsersController extends AppController
{
	public function __construct()
	{
		parent::__construct();
        $this->loadModel('Users');
        $this->loadModel('Cart');
        $this->loadModel('Sale');
	}

	public function index()
	{
        $saleitems = $this->Sale->all();
        if(isset($_SESSION['user'])){
          $usercarts = $this->Cart->checkcartuser($_SESSION['user']->username);
		  $cartscount = $this->Cart->cartcount($_SESSION['user']->username);
          $cartssum = $this->Cart->cartsum($_SESSION['user']->username);
		}else{
		  $usercarts = "";
		  $cartscount = "";
          $cartssum = "";
        }
        
		$this->render('users/add',compact('usercarts','cartscount','cartssum','saleitems'));
	}
	
	public function add(){
        $saleitems = $this->Sale->all();
        if(isset($_SESSION['user'])){
          $usercarts = $this->Cart->checkcartuser($_SESSION['user']->username);
		  $cartscount = $this->Cart->cartcount($_SESSION['user']->username);
          $cartssum = $this->Cart->cartsum($_SESSION['user']->username);
		}else{
		  $usercarts = "";
		  $cartscount = "";
          $cartssum = "";
        }

		$_SESSION = array();
        session_destroy();
        unset($_COOKIE['Thewayshop_user_id']);
        setcookie('Thewayshop_user_id', null, -1, '/');
        
		$errors = false;
        if(!empty($_POST)){
        	$check = $this->Users->checkusers($_POST['username']);
			if ($check) {
				$errors = true;
			} else {
            $params = [
                'username' => $_POST['username'],
                'password' => sha1($_POST['password']),
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'tel' => $_POST['tel']
            ];
            $rs = $this->Users->create($params);
            if($rs){
                $this->redirect('Users/login');
            }
        }
        $this->render('users/add', compact('errors','usercarts','cartscount','cartssum','saleitems'));
      }else{
    	$this->render('users/add', compact('errors','usercarts','cartscount','cartssum','saleitems'));
      }
	}
    
    public function edit(){
        $saleitems = $this->Sale->all();
        if(isset($_SESSION['user'])){
          $usercarts = $this->Cart->checkcartuser($_SESSION['user']->username);
		  $cartscount = $this->Cart->cartcount($_SESSION['user']->username);
          $cartssum = $this->Cart->cartsum($_SESSION['user']->username);
		}else{
		  $usercarts = "";
		  $cartscount = "";
          $cartssum = "";
        }

        $id = $_GET['id'];
		$errors = false;
        if(!empty($_POST)){
           if(sha1($_POST['oldpassword']) != $_SESSION['user']->password){
        	$errors = true;
           }else{
        	$params = [
                'password' => sha1($_POST['password']),
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'tel' => $_POST['tel']
            ];
            $rs = $this->Users->update($id,$params);
            if($rs){
                $this->redirect('');
            }
           }
        }
        $users = $this->Users->find($id);
        $this->render('users/edit', compact('users','errors','usercarts','cartscount','cartssum','saleitems'));
    }

    public function login(){
        $saleitems = $this->Sale->all();
        if(isset($_SESSION['user'])){
          $usercarts = $this->Cart->checkcartuser($_SESSION['user']->username);
		  $cartscount = $this->Cart->cartcount($_SESSION['user']->username);
          $cartssum = $this->Cart->cartsum($_SESSION['user']->username);
		}else{
		  $usercarts = "";
		  $cartscount = "";
          $cartssum = "";
        }
        
        if(isset($_SESSION['user'])){
            $this->redirect('');
        }
        $errors = false;
        if(!empty($_POST)){
            $login = $_POST['username'];
            $pass = $_POST['password'];

            $rs = $this->Users->login($login, $pass);
            if ($rs){
                $this->redirect('');
            } else {
                $errors = true;
            }
        }
        $this->render('users/login', compact('errors','usercarts','cartscount','cartssum','saleitems'));
    }

    public function logout(){
        $_SESSION = array();
        session_destroy();
        unset($_COOKIE['Thewayshop_user_id']);
        setcookie('Thewayshop_user_id', null, -1, '/');
        $this->redirect('Users/login');

    }
}