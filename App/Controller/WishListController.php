<?php

namespace App\Controller;

class WishListController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('WishList');
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

		if (isset($_SESSION['user'])){
		  $wishlist=$this->WishList->checkwishlistuser($_SESSION['user']->username);

		  $collectcartitems=$this->Cart->checkcartuser($_SESSION['user']->username);
		  foreach ($collectcartitems as $item):
		   $itemid=$item->itemid;
	      endforeach;
		  $cartexist=$this->Cart->checkcart($itemid,$_SESSION['user']->username);
		  $this->render('wishlist', compact('wishlist','cartexist','usercarts','cartscount','cartssum','saleitems'));
		}else{
		  $this->redirect('Users/login');
		}
		
	}

	public function addcart(){
	 //$_POST['item_id'] from wishlist.js function addtocart
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

	function delete(){
		if(isset($_POST['item_id'])){
			$rs = $this->WishList->delete($_POST['item_id']);
			if($rs){
				return 1;
			} else {
				return 0;
			}
		}
	}
}