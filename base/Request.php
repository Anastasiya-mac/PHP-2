<?php

namespace base;

class Request 
{
    protected $requestString = '';
    protected $controllerName = null;
    protected $actionName = null;
    protected $isPost = false;
    protected $isGet = true;
    protected $isAjax = false;


    protected $urlPattern = "#MyFolder/public/\?(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<get>.*)#ui";

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    public function getMethod(string $name)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && (mb_strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] == 'xmlhttprequest'))) {
            echo 'ajax';
            exit;
        }
        
        $method = $_SERVER['REQUEST_METHOD'];
        //var_dump($method);
         if ($method == 'GET') {
             echo 'get';
            $result = $this->get($name);
         } elseif ($method == 'POST') {
            echo 'post';
            $result = $this->post($name);
         }
            
         return $result;
    }

    protected function parseRequest()
    {
        if(preg_match_all($this->urlPattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            //var_dump($matches);
        }
    }

    public function get(string $name)
    {
        //var_dump($GET[$name]);
        return $_GET[$name];
    }

    public function post(string $name)
    {
        return $_POST[$name];
    }

    public function param(string $name)
    {
        return $_REQUEST[$name];
    }

    /**
     * @return null
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return null
     */
    public function getActionName()
    {
        return $this->actionName;
    }
}
