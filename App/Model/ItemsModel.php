<?php

namespace App\Model;

use Core\Model\Model;

class ItemsModel extends Model
{
	protected $table = 'items';
	
	public function load($id)
	{
		return $this->query("select * from items where shopid = ?", [$id], false);
	}

	public function checkitems($id)
	{
		return $this->query("select * from items where itemname='" . $_POST['itemname'] . "' and shopid = ?", [$id], true);
	}

	public function findshop($id)
	{
		return $this->query("SELECT * FROM shops WHERE id = ?", [$id], true);
	}

	public function finditemname($id)
	{
		return $this->query("SELECT * FROM items WHERE id = ?", [$id], true);
	}
	
}