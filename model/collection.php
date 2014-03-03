<?php

class collection{
    
    function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function setCollection($uri, $field = 'uri'){
         $data = $this->db->prepare("SELECT * FROM collections WHERE $field = :uri");
         $data->execute(array('uri' => $uri));
         $this->details = $data->fetch(PDO::FETCH_OBJ);
   } 
}