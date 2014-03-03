<?php

Class collectionController Extends baseController {

    public function index() {
       //get instance of the collection and send to view 
       if(isset($this->registry->args["id"])){
            $collection = new collection($this->registry->db);
            $collection->setCollection($this->registry->args["id"] , 'uri');
            $this->registry->template->collection = $collection;
            $this->registry->template->show('collection_view');
        }else{
        /* * * load the index template if no collection found ** */
            $catelogue = new catelogue($this->registry->db);
            $this->registry->template->catelogue = $catelogue->getAll('collections');
            $this->registry->template->show('collection_index');
        }
    }
    

}


