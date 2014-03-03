<?php

Class Template {
    /*
     * @the registry
     * @access private
     */

    private $registry;

    /*
     * @Variables array
     * @access private
     */
    private $vars = array();

    
    /*@the content template
     * 
     */
    
    public $content;
    
    /**
     *
     * @constructor
     *
     * @access public
     *
     * @return void
     *
     */
    function __construct($registry) {
        $this->registry = $registry;
    }

    /**
     *
     * @set undefined vars
     *
     * @param string $index
     *
     * @param mixed $value
     *
     * @return void
     *
     */
    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }

    /**
     * 
     * @param type $name name of content template file
     * @param type $path optional directory of the template file
     * @param string $layout main layout of page
     * @return boolean
     * @throws Exception
     */
    function show($name, $path = 'content', $layout = 'layout_main') {
        $this->content = __SITE_PATH . '/views/' . $path . '/' . $name . '.php';
        $layout =  __SITE_PATH . '/views/' . $layout . '.php';
        
        if (file_exists($this->content) == false) {
            throw new Exception('Template not found in ' . $path);
            return false;
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $$key = $value;
        }

        include ($layout);
    }

}

