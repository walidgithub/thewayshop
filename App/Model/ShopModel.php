<?php

namespace App\Model;

use Core\Model\Model;

class ShopModel extends Model
{
	
	protected $table ="items";

public function searchitems($searchtext,$address)
	{
		return $this->query("select items.id as itemid,
		items.itemname,
		items.priceafter,
		items.pricebefore,
		items.itemtype,
		items.description,
		items.thumb,
		items.sale,
		items.shopid,
		shops.id,
		shops.address
		from items,shops where shops.id=items.shopid and itemname like '%" . $searchtext . "%' and address='" . $address . "'");
		}

public function searchcategory($searchtext,$address)
	{
		return $this->query("select items.id as itemid,
		items.itemname,
		items.priceafter,
		items.pricebefore,
		items.itemtype,
		items.description,
		items.thumb,
		items.sale,
		items.shopid,
		shops.id,
		shops.address
		from items,shops where shops.id=items.shopid and itemtype='" . $searchtext . "' and address='" . $address . "'");
		}
}


