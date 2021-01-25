<?php

namespace App\Model;

use Core\Model\Model;

class WishListModel extends Model
{
    protected $table ="wishlist";

    public function itemdata($id){
			return $this->query("select * from items where id='" . $id . "'");
    }

    public function checkwishlist($id,$username){
			return $this->query("select * from wishlist where itemid='" . $id . "' and username='" . $username . "'");
    }

    public function checkwishlistuser($username){
            return $this->query("select * from wishlist where username='" . $username . "'");
    }

}