<?php
namespace services;

use interfaces\RenderInterface;

class Render implements RenderInterface {

    public function render($template, $params = []) {
        ob_start();
        $templatePath = VIEWS_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}