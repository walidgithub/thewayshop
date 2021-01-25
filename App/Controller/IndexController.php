<?php

namespace App\Controller;

class IndexController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Index');
	}

	public function index()
	{
		$this->render('index');
	}
}