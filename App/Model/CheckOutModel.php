<?php

namespace App\Model;

use Core\Model\Model;

class CheckOutModel extends Model
{
     protected $table ="checkout";

     public function deleteall($username){
          return $this->query("delete from checkout where username='" . $username . "' and incart='Not In Cart'");
     }

     public function normalload($username){
          return $this->query("select * from checkout where username='" . $username . "' and incart='Not In Cart'");
     }

     public function sumbuy($username){
          return $this->query("select sum(total) as totalbuy from checkout where username='" . $username . "' and incart='Not In Cart'");
     }

     public function deleteallcart($username){
          return $this->query("delete from checkout where username='" . $username . "' and incart='In Cart'");
     }

     public function load($username){
          return $this->query("select * from checkout where username='" . $username . "' and incart='In Cart'");
     }

     public function sumcart($username){
          return $this->query("select sum(total) as totalbuy from checkout where username='" . $username . "' and incart='In Cart'");
     }
}