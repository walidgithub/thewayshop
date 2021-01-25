<?php

namespace App\Model;

use Core\Model\Model;

class CartModel extends Model
{
    protected $table ="cart";

    public function itemdata($id){
			return $this->query("select * from items where id='" . $id . "'");
    }
    
    public function checkcart($id,$username){
			return $this->query("select * from cart where itemid='" . $id . "' and username='" . $username . "'");
    }

    public function checkcartuser($username){
            return $this->query("select * from cart where username='" . $username . "'");
    }

    public function cartcount($username){
            return $this->query("select count(id) as allcartscount from cart where username='" . $username . "'");
    }

    public function cartsum($username){
            return $this->query("select sum(itemprice) as cartssum from cart where username='" . $username . "'");
    }
}