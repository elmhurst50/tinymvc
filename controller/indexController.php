<?php

Class indexController Extends baseController {

    public function index() {
        /* * * set a template variable ** */
        $this->registry->template->welcome = 'Welcome to miny MVC';
        /* * * load the index template ** */
        $this->registry->template->show('index');
    }
    
    public function about() {
        /* * * set a template variable ** */
        $this->registry->template->welcome = 'about';
        /* * * load the index template ** */
        $this->registry->template->show('index_about');
    }
    
    public function  collections(){
        /* * * set a template variable ** */
        $this->registry->template->welcome = 'collections index page';
        /* * * load the index template ** */
        $this->registry->template->show('collection_index');
    }
    
    public function  fabric(){
        /* * * set a template variable ** */
        $this->registry->template->welcome = 'fabricindex page';
        /* * * load the index template ** */
        $this->registry->template->show('fabric_index');
    }


}
