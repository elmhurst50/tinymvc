<?php

Class cushionController Extends baseController {

    public function index() {
       //get instance of the collection and send to view 
       if(isset($this->registry->args["id"])){
            $collection = new cushion($this->registry->db);
            $collection->setCushion($this->registry->args["id"] , 'uri');
            $this->registry->template->collection = $collection;
            $this->registry->template->show('cushion_view');
        }else{
        /* * * load the index template if no collection found ** */
            $catelogue = new catelogue($this->registry->db);
            $this->registry->template->catelogue = $catelogue->getAll('cushions');
            $this->registry->template->show('cushion_index');
        }
    }
    

}


