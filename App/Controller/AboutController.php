<?php

namespace App\Controller;

class AboutController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('About');
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

		$this->render('about',compact('usercarts','cartscount','cartssum','saleitems'));
	}
}