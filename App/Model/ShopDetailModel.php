<?php

namespace App\Model;

use Core\Model\Model;

class ShopDetailModel extends Model
{
	protected $table = 'items';
	
	public function searchitems($id)
	{
		return $this->query("select * from items where id = ?", [$id], false);
	}
}