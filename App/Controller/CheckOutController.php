<?php

namespace App\Controller;

class CheckOutController extends AppController
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
		
        $total = $this->CheckOut->sumbuy($_SESSION['user']->username);
		$items = $this->CheckOut->normalload($_SESSION['user']->username);
		$this->render('checkout', compact('items','total','usercarts','cartscount','cartssum','saleitems'));
		
		$this->CheckOut->deleteall($_SESSION['user']->username);
	}
}