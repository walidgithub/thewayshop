<?php

namespace App\Model;

use Core\Model\Model;

class MyShopModel extends Model
{
	protected $table = 'shops';
	
	public function find($id)
	{
		return $this->query("SELECT
				* FROM shops where id = ?", [$id], true);
	}

	public function checkshops($shopname,$address,$category)
	{
		return $this->query("select * from shops where shopname='" . $shopname . "' and address='" . $address . "'
         and category='" . $category . "'");
	}
	
	public function checkAddOrEdit()
	{
		return $this->query("select * from shops where username='" . $_SESSION['user']->username . "'");
	}
}