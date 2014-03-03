<?php

class fabric{
    
    function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function setFabric($uri, $field = 'uri'){
         $data = $this->db->prepare("SELECT * FROM fabric WHERE $field = :uri");
         $data->execute(array('uri' => $uri));
         $this->details = $data->fetch(PDO::FETCH_OBJ);
   } 
}