<?php

namespace App\Controller;

class MyShopController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('MyShop');
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

		$this->render('shops/myshop',compact('usercarts','cartscount','cartssum','saleitems'));
	}

	public function addshop()
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

		$errors = false;
		if (!empty($_POST)) {
			$check = $this->MyShop->checkshops($_POST['shopname'],$_POST['address'],$_POST['category']);
			if ($check) {
				$errors = true;
				//view
			    $this->render('shops/myshop', compact('errors','usercarts','cartscount','cartssum','saleitems'));
			} else {
				$params=[
					'shopname'=>$_POST['shopname'],
					'category'=>$_POST['category'],
					'address'=>$_POST['address'],
					'username' => $_SESSION['user']->username,
					'description'=>$_POST['description']
				];
				$rs=$this->MyShop->create($params);
				
				$_SESSION['lastshopid'] = $this->MyShop->db->pdo->lastInsertId();
                $ShopID = $this->MyShop->db->pdo->lastInsertId();

				$sql = "INSERT INTO stars(star1value,star2value,star3value,star4value,star5value,shopid) VALUES ";
				$valu = 0;
				$sql .= "({$valu}, {$valu}, {$valu}, {$valu}, {$valu}, {$ShopID}),";
				$sql = rtrim($sql, ',');

				$this->MyShop->query($sql, null, 'multi_insert');
				
				if ($rs) {
					//controller
					$this->redirect('Items/additem/'.$ShopID);
				}
			}
			//view
			$this->render('shops/myshop', compact('errors','usercarts','cartscount','cartssum','saleitems'));
		} else {
			//view
			$this->render('shops/myshop', compact('errors','usercarts','cartscount','cartssum','saleitems'));
		}
	}

	public function editshop()
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
		
		$errors = false;
		$checkold = $this->MyShop->checkAddOrEdit();
		foreach ($checkold as $t):
			$shopnameold = $t->shopname;
			$addressold = $t->address;
			$categoryold = $t->category;
		endforeach;
        $id = $_GET['id'];
        
        if (!empty($_POST)) {
        	if ($shopnameold != $_POST['shopname']||$addressold != $_POST['address']||$categoryold != $_POST['category']){
        		$check = $this->MyShop->checkshops($_POST['shopname'],$_POST['address'],$_POST['category']);
        		if ($check) {
                $errors = true;
				}else{
					$params=[
				'shopname'=>$_POST['shopname'],
				'category'=>$_POST['category'],
				'address'=>$_POST['address'],
				'username' => $_SESSION['user']->username,
				'description'=>$_POST['description']
				];
                $rs = $this->MyShop->update($id, $params);
                 if ($rs) {
                    $this->redirect('additem/'.$id);
                 }
        	    }
        }else{
        		$params=[
				'shopname'=>$_POST['shopname'],
				'category'=>$_POST['category'],
				'address'=>$_POST['address'],
				'username' => $_SESSION['user']->username,
				'description'=>$_POST['description']
				];
                $rs = $this->MyShop->update($id, $params);
                if ($rs) {
                    $this->redirect('Items/additem/'.$id);
                }
        	}
            $shopdata = $this->MyShop->find($id);
            $this->render('shops/edit', compact('shopdata', 'errors', 'usercarts', 'cartscount', 'cartssum','saleitems'));  
    } else {
            $shopdata = $this->MyShop->find($id);
            $this->render('shops/edit', compact('shopdata', 'errors', 'usercarts', 'cartscount', 'cartssum','saleitems'));
    }
}
	
	public function addoredit()
	{
		$check = $this->MyShop->checkAddOrEdit();
		foreach ($check as $t):
			$id = $t->id;
		endforeach;
			if ($check) {
				//controller
                $this->redirect('MyShop/editshop/'.$id);
			} else {
				//controller
                $this->redirect('MyShop/addshop');
			}
	}
}