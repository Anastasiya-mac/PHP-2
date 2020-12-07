<?php

namespace controllers;
use models\Product;
use services\Render;
use services\TwigRenderer;

abstract class Controller 
{
    protected $defaultAction = 'index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'main';
    protected $renderer; 

    public function __construct () {
        $this->renderer = \base\Application::getInstance()->renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if(method_exists($this, $method)) {
            $this->$method();
            
        } else {
            throw new \Exception("Метод не найден");
        }
    }
    public function actionIndex() {
        echo 'CATALOG';
    }

    protected function render($template, $params = []){
        
        $content = $this->renderer->render($template, $params);
        if($this->useLayout) {
            return $this->renderer->render( 
                "layouts/{$this->layout}",
                ['content' => $content]
            );
        }
        return $content;
    }

    
}