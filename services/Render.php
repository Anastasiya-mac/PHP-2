<?php
namespace services;

use interfaces\RenderInterface;

class Render implements RenderInterface {

    public function render($template, $params = []) {
        ob_start();
        $templatePath = \base\Application::getInstance()->getConfig()['views_dir'] . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}