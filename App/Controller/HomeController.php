<?php

namespace App\Controller;

class HomeController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Cart');
		$this->loadModel('Sale');
		$this->loadModel('Shop');
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
		
		$this->render('index', compact('cartscount','usercarts','cartssum','saleitems'));
	}
}