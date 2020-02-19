<?php

class core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'Index';
    protected $params = array();

    public function _construct(){
        $url = $this->getUrl();
        if(file_exists('../app/controller/'.ucwords($url[0]).'php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //create controller obj
        require_once '..app/controller/'.$this->currentController.'php';
        //CHECK METHOD
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[0];
                unset($url[1]);
            }
        }
        echo '<pre>';
        print_r($url);
        echo '</pre>';

        echo '<pre>';
        print_r($this->currentController);
        echo '</pre>';

        echo '../app/controller/'.ucwords($url[0]).'php';
    }
    // get url from link an prep for use
    public function getUrl(){
        if(print_n($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}