<?php
class cliente_model extends Model {

   function __construct(){
      parent::Model();
   }
   
   function get_clients(){
      $ssql = "select * from cliente";
      return mysql_query($ssql);
   }
}
?>