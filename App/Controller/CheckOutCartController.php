<?php

namespace App\Controller;

class CheckOutCartController extends AppController
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

        $totalcart = $this->CheckOut->sumcart($_SESSION['user']->username);
		$itemscart = $this->CheckOut->load($_SESSION['user']->username);
		$this->render('checkoutcart', compact('itemscart','totalcart','usercarts','cartscount','cartssum','saleitems'));
		
		$this->CheckOut->deleteallcart($_SESSION['user']->username);
	}
}