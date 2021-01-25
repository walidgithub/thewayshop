<?php

namespace App\Controller;

class CartController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Cart');
		$this->loadModel('CheckOut');
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

		if (isset($_SESSION['user'])){
		  $cart=$this->Cart->checkcartuser($_SESSION['user']->username);
		  $this->render('cart', compact('cart','usercarts','cartscount','cartssum','saleitems'));
		}else{
		  $this->redirect('Users/login');
		}
		
	}

	function delete(){
		if(isset($_POST['item_id'])){
			$rs = $this->Cart->delete($_POST['item_id']);
			if($rs){
				return 1;
			} else {
				return 0;
			}
		}
	}

	public function addcheck(){
		if(!empty($_POST)){
			for ($i = 0; $i < count($_REQUEST["itemname"]); $i++) {
               $params = [
			   'itemname' => $_REQUEST["itemname"][$i],  
			   'itemprice' => $_REQUEST["itemprice"][$i],
			   'quantity' => $_REQUEST["quantity"][$i],
			   'total' => $_REQUEST["itemprice"][$i] * $_REQUEST["quantity"][$i],
			   'incart' => "In Cart",
			   'username' => $_SESSION['user']->username
		     ];
             
			 $this->CheckOut->create($params);
			}	
		}
		
	}
}