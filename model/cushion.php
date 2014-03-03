<?php

class cushion{
    
    function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function setcushion($uri, $field = 'uri'){
         $data = $this->db->prepare("SELECT * FROM cushions WHERE $field = :uri");
         $data->execute(array('uri' => $uri));
         $this->details = $data->fetch(PDO::FETCH_OBJ);
   } 
}