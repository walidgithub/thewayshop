<?php

namespace App\Controller;

class ShopController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Shop');
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
		$this->render('shop', compact('usercarts','cartscount','cartssum','saleitems'));
	}
	
	public function search(){
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

		$errors=false;
		if (!empty($_POST)) {
			$items=$this->Shop->searchitems($_POST['search'],$_POST['address']);
			
			if (isset($_SESSION['user'])){
				$wichlistexist=$this->WishList->checkwishlistuser($_SESSION['user']->username);
			}else{
				$wichlistexist="";
			}

			if (isset($_SESSION['user'])){
				$cartexist=$this->Cart->checkcartuser($_SESSION['user']->username);
			}else{
				$cartexist="";
			}
			
			$this->render('shop', compact('items','errors','wichlistexist','cartexist','usercarts','cartscount','cartssum','saleitems'));
		}
	}

	public function searchall(){
		
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

		$errors=false;
		if (!empty($_POST)) {
			$items=$this->Shop->searchcategory($_POST['searchall'],$_POST['address']);
			if ($items){
               if (isset($_SESSION['user'])){
				$wichlistexist=$this->WishList->checkwishlistuser($_SESSION['user']->username);
			   }else{
				$wichlistexist="";
			   }

			   if (isset($_SESSION['user'])){
				$cartexist=$this->Cart->checkcartuser($_SESSION['user']->username);
			   }else{
				$cartexist="";
			   }
			
			   $this->render('shop', compact('items','errors','wichlistexist','cartexist','usercarts','cartscount','cartssum','saleitems'));
		
			}else{
				$items="";
               $errors=true;
			   $this->render('shop', compact('items','errors','usercarts','cartscount','cartssum','saleitems'));
			}
			}else{
				$items="";
			$errors=true;
			$this->render('shop', compact('items','errors','usercarts','cartscount','cartssum','saleitems'));
		}
	}

	public function addwishlist(){
	 if(isset($_SESSION['user'])){
       if(isset($_POST['item_id'])){
		$checkfirst=$this->WishList->checkwishlist($_POST['item_id'],$_SESSION['user']->username);
		 
        if ($checkfirst){
            foreach ($checkfirst as $wishitem):
	         $id=$wishitem->id;
	        endforeach;
		    $this->WishList->delete($id);
			return 2;
		}else{
          $itemdata=$this->WishList->itemdata($_POST['item_id']);
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
	   }
	 }else{
		 return 0;
	 }
	}

	public function addcart(){
	  if(isset($_SESSION['user'])){
       if(isset($_POST['item_id'])){
        $checkcartfirst=$this->Cart->checkcart($_POST['item_id'],$_SESSION['user']->username);
        if ($checkcartfirst){
            foreach ($checkcartfirst as $cartitem):
	         $id=$cartitem->id;
	        endforeach;
		    $this->Cart->delete($id);
			return 2;
		}else{
          $itemdata=$this->Cart->itemdata($_POST['item_id']);
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
	   }
	 }else{
		 return 0;
	 }
	}
}
