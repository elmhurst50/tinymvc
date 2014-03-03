<?php

Class fabricController Extends baseController {

    public function index() {
       //get instance of the collection and send to view 
       if(isset($this->registry->args["id"])){
            $collection = new fabric($this->registry->db);
            $collection->setFabric($this->registry->args["id"] , 'uri');
            $this->registry->template->collection = $collection;
            $this->registry->template->show('fabric_view');
        }else{
        /* * * load the index template if no collection found ** */
            $catelogue = new catelogue($this->registry->db);
            $this->registry->template->catelogue = $catelogue->getAll('fabric');
            $this->registry->template->show('fabric_index');
        }
    }
    

}


