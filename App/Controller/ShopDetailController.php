<?php

namespace App\Controller;

class ShopDetailController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('ShopDetail');
		$this->loadModel('WishList');
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

		$this->render('shopdetail',compact('usercarts','cartscount','cartssum','saleitems'));
	}
	
	public function showoneitem(){
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

		$id=$_GET['id'];
		$shopdetails = $this->ShopDetail->searchitems($id);

		if (isset($_SESSION['user'])){
				$wichlistexist=$this->WishList->checkwishlist($id,$_SESSION['user']->username);
		}else{
				$wichlistexist="";
		}

		if (isset($_SESSION['user'])){
				$cartexist=$this->Cart->checkcart($id,$_SESSION['user']->username);
		}else{
				$cartexist="";
		}

		$this->render('shopdetail', compact('shopdetails','wichlistexist','cartexist','usercarts','cartscount','cartssum','saleitems'));
	}

	public function addwishlist(){
	 //$_POST['item_id'] from shopdetail.js function addtocart
	 $Generalid=$_POST['item_id'];
	 if(isset($_SESSION['user'])){
        $checkfirst=$this->WishList->checkwishlist($Generalid,$_SESSION['user']->username);
        if ($checkfirst){
            foreach ($checkfirst as $wishitem):
	         $id=$wishitem->id;
	        endforeach;
		    $this->WishList->delete($id);
			return 2;
		}else{
          $itemdata=$this->WishList->itemdata($Generalid);
          foreach ($itemdata as $item):
		   $itemid=$item->id;
		   $itemname=$item->itemname;
	       $itemprice=$item->priceafter;
	       $itemthumb=$item->thumb;
	     endforeach;
	     $params = [
				'itemid' => $itemid,
				'itemname'=>$itemname,
				'itemprice' => $itemprice,
				'username' => $_SESSION['user']->username,
				'thumb'=>$itemthumb
			];

			$rs = $this->WishList->create($params);
			if ($rs) {
	            return 1;
			} else {
				return 0;
			}
		}
	 }else{
		 return 0;
	 }
	}

	public function addcart(){
	 //$_POST['item_id'] from shopdetail.js function addtocart
	  $Generalid=$_POST['item_id'];
	  if(isset($_SESSION['user'])){
		$checkcartfirst=$this->Cart->checkcart($Generalid,$_SESSION['user']->username);
        if ($checkcartfirst){
            foreach ($checkcartfirst as $cartitem):
	         $id=$cartitem->id;
	        endforeach;
		    $this->Cart->delete($id);
			return 2;
		}else{
          $itemdata=$this->Cart->itemdata($Generalid);
          foreach ($itemdata as $item):
		   $itemid=$item->id;
		   $itemname=$item->itemname;
	       $itemprice=$item->priceafter;
	       $itemthumb=$item->thumb;
	      endforeach;
	     $params = [
				'itemid' => $itemid,
				'itemname'=>$itemname,
				'itemprice' => $itemprice,
				'username' => $_SESSION['user']->username,
				'thumb'=>$itemthumb
			];

			$rs = $this->Cart->create($params);
			if ($rs) {
	            return 1;
			} else {
				return 0;
			}
		}
	 }else{
		 return 0;
	 }
	}

	public function addcheck(){
		if(!empty($_POST)){
          $params = [
			'itemname' => $_POST['itemname'],
			'itemprice' => $_POST['itemprice'],
			'quantity' => $_POST['quantity'],
			'total' => $_POST['itemprice'] * $_POST['quantity'],
			'incart' => "Not In Cart",
			'username' => $_SESSION['user']->username
		  ];

		  $this->CheckOut->create($params);
		}
		
	}
}