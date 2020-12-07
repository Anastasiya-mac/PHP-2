<?php
namespace base;
include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/traits/Singleton.php";
use traits\Singleton;

class Application 
{
    use Singleton;

    protected $config;
    protected $componentsFactory; 
    protected $components = [];


    public function run(array $config) {


        $this->config = $config;
        $this->componentsFactory = new ComponentsFactory();

        $controllerName = $this->request->getControllerName() ?: $this->config['default_controller'];
        $actionName = $this->request->getActionName();
        $controllerClass = $this->config['controller_namespace'] . ucfirst($controllerName) . "Controller";

        if(class_exists($controllerClass)) {
            $controller = new $controllerClass($this->renderer);
            //try {
            $controller->runAction($actionName); 
            //}
            /*catch (Exception $e) {
                (new controllers\ErrorController($renderer))->RunAction('NotFound');
            }*/
            
        }
    }

    public function __get($name) {
        if(is_null($this->components[$name])) {

            if ($params = $this->config['components'][$name]) {
                $this->components[$name] = $this->componentsFactory->createComponent($name, $params);
            }
        }
        return $this->components[$name];
    }

    public function getConfig() {
        return $this->config;
    }


}
