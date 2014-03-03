<?php

/**
 * Description of catelogue
 *
 * @author Sam
 */
class catelogue {
    
    function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function getAll($product){
         $list = array();
         $data = $this->db->prepare("SELECT * FROM $product");
         $data->execute();
         foreach ($data as $value) {
             array_push($list, $value);
         }
         return $list;
          
    }
}
