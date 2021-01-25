<?php

namespace App\Controller;

class ContactController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Contact');
		$this->loadModel('Cart');
		$this->loadModel('Sale');
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
		if (!empty($_POST)) {
		$params=[
				'name'=>$_POST['yourname'],
				'email'=>$_POST['email'],
				'subject'=>$_POST['contactsubject'],
				'message'=>$_POST['message']
				];
				$rs = $this->Contact->create($params);
				var_dump($params);
                if ($rs) {
                    $this->redirect('');
				}
				//$this->render('contact',compact('usercarts','cartscount','cartssum','saleitems'));
		}else{
               $this->render('contact',compact('usercarts','cartscount','cartssum','saleitems'));
		}
	}
}