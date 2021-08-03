<?php

/**
 * App Core class
 * Creates URL and loads controller
 * URL FORMAT  /controller/method/params
 */
class Core
{
    protected $currentController = "Site";
    protected $currentMethod = "index";
    protected $param = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //Look for controllers
        if (isset($url[0])) {
            if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            } else {
                http_response_code(404);
                die;
            }
        }

        //require controllers
        require_once "../app/controllers/" . $this->currentController . ".php";
        $this->currentController = new $this->currentController;

        //check
        if (isset($url[1])) {
            //check if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            } else {
                http_response_code(404);
                die;
            }
        }

        // Get Params
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([
            $this->currentController,
            $this->currentMethod
        ], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
