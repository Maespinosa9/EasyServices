<?php
class cliente_model extends CI_Model {

    function get_clients(){
      $ssql = "select * from cliente";
      return mysql_query($ssql);
   }
}
?>