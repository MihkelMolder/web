<?php

class core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'Index';
    protected $params = array();

    public function _construct(){
        $url = $this->getUrl();
        echo '<pre>';
        print_r($url);
        echo '</pre>';
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