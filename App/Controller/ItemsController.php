<?php

namespace App\Controller;
use Core\Upload;

class ItemsController extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Items');
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

		$this->render('items',compact('usercarts','cartscount','cartssum','saleitems'));
	}

	public function additem()
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

		$id = $_GET['id'];
		$errors1 = false;
		$errors2 = false;
		if (!empty($_POST)) {
			$check = $this->Items->checkitems($id);
if ($check) {
				$errors1 = true;
			} else {
				$check2=$this->Items->findshop($id);
				if ($check2){
					$name = $_FILES['file']['name'];
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);

                // Select file type
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array("jpg", "jpeg", "png", "gif");
                
                // Convert to base64
                    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                    $thumb_name = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
                
            $params = [
				'itemname' => $_POST['itemname'],
				'priceafter' => $_POST['priceafter'],
				'pricebefore' => $_POST['pricebefore'],
				'itemtype' => $_POST['itemtype'],
				'description' => $_POST['description'],
				'thumb'=>$thumb_name,
				'sale'=>"Not Sale",
				'shopid' => $id
			];

			$rs = $this->Items->create($params);

			$itemid = $this->Items->db->pdo->lastInsertId();

			if ($_POST['priceafter'] <> $_POST['pricebefore']){
              $params2 = [
				  'itemname' => $_POST['itemname'],
				  'priceafter' => $_POST['priceafter'],
				  'pricebefore' => $_POST['pricebefore'],
				  'itemid' => $itemid,
				  'shopid' => $id
			  ];
			  $this->Sale->create($params2);

			  $paramsedit = [
				'sale'=>"Sale"
			  ];
			  $this->Items->update($itemid,$paramsedit);
			}

			if ($rs) {
				$this->redirect('Items/additem/'.$id);
			}
				}else{
					$errors2 = true;
				}
			}
			$items = $this->Items->load($id);
			$this->render('items', compact('items', 'errors1','errors2','usercarts','cartscount','cartssum','saleitems'));
		} else {
			$items = $this->Items->load($id);
			$this->render('items', compact('items', 'errors1','errors2','usercarts','cartscount','cartssum','saleitems'));
		}
	}
	
	function delete(){
		if(isset($_POST['item_id'])){
			$rs = $this->Items->delete($_POST['item_id']);
			$this->Sale->delete2($_POST['item_id']);
			if($rs){
				return 1;
			} else {
				return 0;
			}
		}
	}

}